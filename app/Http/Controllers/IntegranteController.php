<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Integrante;

class IntegranteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('integrantes.index', ['integrantes'=>Integrante::all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('integrantes.create');
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
            "nombre" => "required|string",
            "descripcion" => "required|string",
            "image" => "image",
            ]);

        if ($request->hasFile("image")){
            $path = $request->image->store('public');
        }else{ 
            $path = "public/noImgUser.png";
        }


        $alreadyExists = Integrante::where('nombre',$request->nombre)->count();

        if($alreadyExists == 0){
            //no existe
            Integrante::create(["nombre"=>$request->nombre, "descripcion"=>$request->descripcion, "foto"=>$path]);
        }else{
            //existe
            $request->session()->flash('error', "Este integrante ya esta registrado");
            return back()->withInput();
        }

        $request->session()->flash("message", "Creado con exito");
        return redirect()->route("integrantes.index");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $integrante = Integrante::where('id', $id)->firstOrFail();
        return view('integrantes.show', ['integrante' => $integrante]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $integrante = Integrante::where('id', $id)->firstOrFail();
        return view('integrantes.edit', ['integrante' => $integrante]);
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

            $integrante = Integrante::where('id' , $id)->firstOrFail();

            $this->validate($request,[
                "nombre" => "required|string",
                "descripcion" => "required|string",
                "image" => "image",
                ]);

            $updating = $request->all();

            if ($request->hasFile('image')){
                $updating['foto'] = $request->image->store("public");
            }
            
            $alreadyExists = Integrante::where('nombre', $request->nombre)->where('id', '<>' ,$id)->count();

            if($alreadyExists == 0){
                //no existe
                $integrante->update($updating);
            }else{
                //existe
                $request->session()->flash('error',"Este integrante ya ha sido creado.");
                return back()->withInput();
            }

        }while(false);

        $request->session()->flash("message", "Actualizado con exito");
        return redirect()->route("integrantes.index");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $integrante = Integrante::where('id' , $id)->firstOrFail();
        $deleted = $integrante->delete();

        if($deleted){
            $request->session()->flash("deleted", "Eliminado con &eacute;xito");
        }
        else{
            $request->session()->flash("failDeleted", "Algo sali&oacute; mal. Por favor contacta a desarrollo.");
        }
        return redirect()->route("integrantes.index");
    }
}
