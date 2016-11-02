<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Seccion;

class SeccionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('secciones.index', ['secciones'=>Seccion::all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('secciones.create');
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
        ]);

        $alreadyExists = Seccion::where("titulo", $request->titulo)->count();

        if($alreadyExists == 0)
        {
            Seccion::create(["titulo"=>$request->titulo, "descripcion"=>$request->descripcion]);
        }
        else
        {
            $request->session()->flash('error', "Esa sección ya se había creado anteriormente");
            return back()->withInput();
        }

        $request->session()->flash("message", "Agregado con exito");
        return redirect()->route("secciones.create");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('secciones.show', ['seccion' => Seccion::where('id', $id)->firstOrFail()]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $seccion = Seccion::where('id', $id)->firstOrFail();
        return view('secciones.edit', ['seccion' => $seccion]);
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
        $seccion = Seccion::where('id', $id)->firstOrFail();

        $this->validate($request, ["titulo" => "required|string", "descripcion" => "required|string"]);
        
        $updating = $request->all();

        $alreadyExists = Seccion::where('titulo', $request->titulo)->where('id', '<>', $id)->count();

        if($alreadyExists == 0)
            $seccion->update($updating);
        else
        {
            $request->session()->flash('error', 'Esta seccion ya ha sido creada');
            return back()->withInput();
        }

        $request->session()->flash("message", "Actualizado con exito");
        return redirect()->route("secciones.index");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $seccion = Seccion::where('id', $id)->firstOrFail();
        $deleted = $seccion->delete();

        if($deleted)
        {
            $request->session()->flash('deleted', "Eliminado con &eacute;xito");
        }
        else
        {
            $request->session()->flash('failDeleted', "Algo sali&oacute; mal. Por favor contacta a desarrollo.");
        }

        return redirect()->route("secciones.index");
    }
}
