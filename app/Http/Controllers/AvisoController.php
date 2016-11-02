<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Aviso;

class AvisoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('avisos.index', ['avisos'=>Aviso::all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('avisos.create');
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
            "image" => "required|image",
            ]);

        $path = $request->image->store('public');

        $alreadyExists = Aviso::where('titulo',$request->titulo)->count();

        if($alreadyExists == 0){
            //no existe
            Aviso::create(["titulo"=>$request->titulo, "descripcion"=>$request->descripcion, "foto"=>$path]);
        }else{
            //existe
            $request->session()->flash('error', "Este aviso ya ha sido creado anteriormente");
            return back()->withInput();
        }

        $request->session()->flash("message", "Creado con exito");
        return redirect()->route("avisos.index");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $aviso = Aviso::where('id', $id)->firstOrFail();
        return view('avisos.show', ['aviso' => $aviso]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $aviso = Aviso::where('id', $id)->firstOrFail();
        return view('avisos.edit', ['aviso' => $aviso]);
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
        $message = "";
        do{

            $aviso = Aviso::where('id' , $id)->firstOrFail();

            $this->validate($request,[
                "titulo" => "required|string",
                "descripcion" => "required|string",
                "image" => "image",
            ]);

            $updating = $request->all();

            if ($request->hasFile('image')){
                $updating['foto'] = $request->image->store("public");
            }
            
            $alreadyExists = Aviso::where('titulo', $request->titulo)->where('id', '<>' ,$id)->count();

            if($alreadyExists == 0){
                //no existe
                $aviso->update($updating);
            }else{
                //existe
                $request->session()->flash('error',"Este aviso ya ha sido creado.");
                return back()->withInput();
            }

        }while(false);

        $request->session()->flash("message", "Actualizado con exito");
        return redirect()->route("avisos.index");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $aviso = Aviso::where('id' , $id)->firstOrFail();
        $deleted = $aviso->delete();

        if($deleted){
            $request->session()->flash("deleted", "Eliminado con &eacute;xito");
        }
        else{
            $request->session()->flash("failDeleted", "Algo sali&oacute; mal. Por favor contacta a desarrollo.");
        }
        return redirect()->route("avisos.index");
    }
}
