<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Actividad;
use App\Seccion;

class ActividadController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return view('actividades.index', ['actividades'=>Actividad::all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $seccion = Seccion::select('titulo')->get();
        $titulos = [];
        foreach ($seccion as $titulo) {
            $titulos[] = $titulo->titulo;
        }
        return view('actividades.create', ['secciones'=>$titulos]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $message = "";
        $this->validate($request,[
            "titulo" => "required|string",
            "descripcion" => "required|string",
            "seccion" => "required|string",
            ]);

        $seccion = $request->seccion + 1;

        $alreadyExists = Actividad::where("titulo",$request->titulo)->count();

        if($alreadyExists == 0){
            //no existe
            Actividad::create(["titulo"=>$request->titulo, "descripcion"=>$request->descripcion, "seccion"=>$seccion]);
        }else{
            //existe
            $request->session()->flash('error', "Ya existe esta actividad.");
            return back()->withInput();
        }

        $request->session()->flash("message", "Creado con exito");
        return redirect()->route("actividades.index");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $actividad = Actividad::where('id', $id)->firstOrFail();
        return view('actividades.show', ['actividad' => $actividad]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $seccion = Seccion::select('titulo')->get();
        $titulos = [];
        foreach ($seccion as $titulo) {
            $titulos[] = $titulo->titulo;
        }
        $actividad = Actividad::where('id', $id)->firstOrFail();
        return view('actividades.editar', ['actividad' => $actividad], ['secciones' => $titulos]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        do{
            $message = "";
            $actividad = Actividad::where('id' , $id)->firstOrFail();

            $this->validate($request,[
                "titulo" => "required|string",
                "descripcion" => "required|string",
                "seccion" => "required|string",
                ]);

            $seccion = $request->seccion + 1;
            
            $alreadyExists = Actividad::where("titulo",$request->titulo)->count();

            if($alreadyExists < 1){
                //no existe
                $actividad->titulo = $request->titulo;
                $actividad->descripcion = $request->descripcion;
                $actividad->seccion = $seccion;
                $actividad->save();
            }else{
                //existe
                if(Actividad::where('titulo', $request->titulo)->first()->id == $id){
                    $actividad->titulo = $request->titulo;
                    $actividad->descripcion = $request->descripcion;
                    $actividad->seccion = $seccion;
                    $actividad->save();
                }
                else{   
                    $request->session()->flash('error', "Ya existe esta actividad.");
                    return back()->withInput();
                }
            }

        }while(false);

        $request->session()->flash("message", "Actualizado con exito");
        return redirect()->route("actividades.index");    
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $actividad = Actividad::where('id', $id)->firstOrFail();
        $deleted = $actividad->delete();

        if($deleted){
            $request->session()->flash('deleted', "Eliminado con &eacute;xito");
        }
        else{
            $request->session()->flash('failDeleted', "Algo sali&oacute; mal. Por favor contacta a desarrollo.");
        }

        return redirect()->route("actividades.index");
    }
}
