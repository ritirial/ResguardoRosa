<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\FotoActividad;
use App\Actividad;

class FotoActividadController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('fotosactividades.index', ['fotosactividades'=>FotoActividad::all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $actividades = Actividad::select('titulo')->get();
        
        foreach ($actividades as $titulo) {
            $titulos[] = $titulo->titulo;
        }
        return view('fotosactividades.create', ['fotosactividades'=>$titulos]);
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
            "image" => "required|image",
            "actividad" => "required|string",
            ]);
        
        $path = $request->image->store('public');
        
        $index = $request->actividad;

        $actividades = Actividad::select('titulo')->get();
        
        foreach ($actividades as $titulo) {
            $titulos[] = $titulo->titulo;
        }

        $actividad = Actividad::where('titulo', $titulos[$index])->first()->id;

        FotoActividad::create(["ruta"=>$path, "actividad"=>$actividad]);

        $request->session()->flash("message", "Creado con exito");
        return redirect()->route("fotosactividades.index");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        echo $id;
        $actividad = FotoActividad::where('id', $id)->firstOrFail();
        $deleted = $actividad->delete();

        if($deleted){
            $request->session()->flash('deleted', "Eliminado con &eacute;xito");
        }
        else{
            $request->session()->flash('failDeleted', "Algo sali&oacute; mal. Por favor contacta a desarrollo.");
        }

        return redirect()->route("fotosactividades.index");
    }
}
