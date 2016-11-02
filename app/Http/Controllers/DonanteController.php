<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Donante;

class DonanteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('donantes.index', ['donantes'=>Donante::all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('donantes.create');
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
            "image" => "required|image",
            ]);

        $path = $request->image->store('public');

        $alreadyExists = Donante::where('nombre',$request->nombre)->count();

        if($alreadyExists == 0){
            //no existe
            Donante::create(["nombre"=>$request->nombre, "descripcion"=>$request->descripcion, "logo"=>$path]);
        }else{
            //existe
            $request->session()->flash('error', "Este donante ya esta registrado");
            return back()->withInput();
        }

        $request->session()->flash("message", "Creado con exito");
        return redirect()->route("donantes.index");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $donante = Donante::where('id', $id)->firstOrFail();
        return view('donantes.show', ['donante' => $donante]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $donante = Donante::where('id', $id)->firstOrFail();
        return view('donantes.edit', ['donante' => $donante]);
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

            $donante = Donante::where('id' , $id)->firstOrFail();

            $this->validate($request,[
                "nombre" => "required|string",
                "descripcion" => "required|string",
                "image" => "image",
            ]);

            $updating = $request->all();

            if ($request->hasFile('image')){
                $updating['logo'] = $request->image->store("public");
            }
            
            $alreadyExists = Donante::where('nombre', $request->nombre)->where('id', '<>' ,$id)->count();

            if($alreadyExists == 0){
                //no existe
                $donante->update($updating);
            }else{
                //existe
                $request->session()->flash('error',"Este donante ya ha sido creado.");
                return back()->withInput();
            }

        }while(false);

        $request->session()->flash("message", "Actualizado con exito");
        return redirect()->route("donantes.index");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $donante = Donante::where('id' , $id)->firstOrFail();
        $deleted = $donante->delete();

        if($deleted){
            $request->session()->flash("deleted", "Eliminado con &eacute;xito");
        }
        else{
            $request->session()->flash("failDeleted", "Algo sali&oacute; mal. Por favor contacta a desarrollo.");
        }
        return redirect()->route("donantes.index");
    }
}
