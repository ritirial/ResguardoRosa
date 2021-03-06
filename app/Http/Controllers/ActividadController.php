<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Actividad;
use App\Seccion;
use Carbon\Carbon;

class ActividadController extends Controller
{
    public function __construct()
    {
        Carbon::setLocale('es');
    }

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
        return view('actividades.create');
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
            "fecha" => "required|date",
            ]);

        $alreadyExists = Actividad::where("titulo",$request->titulo)->count();

        if($alreadyExists == 0){
            //no existe
            Actividad::create(["titulo"=>$request->titulo, "descripcion"=>$request->descripcion, "fecha"=>$request->fecha]);
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
        $actividad = Actividad::where('id', $id)->firstOrFail();
        return view('actividades.editar', ['actividad' => $actividad]);
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
                "fecha" => "required|date",
                ]);
            
            $alreadyExists = Actividad::where("titulo",$request->titulo)->count();

            if($alreadyExists < 1){
                //no existe
                $actividad->titulo = $request->titulo;
                $actividad->descripcion = $request->descripcion;
                $actividad->fecha = $request->fecha;
                $actividad->save();
            }else{
                //existe
                if(Actividad::where('titulo', $request->titulo)->first()->id == $id){
                    $actividad->titulo = $request->titulo;
                    $actividad->descripcion = $request->descripcion;
                    $actividad->fecha = $request->fecha;
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
