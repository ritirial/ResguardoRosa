<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\FotoActividad;
use App\Integrante;
use App\Actividad;
use App\Donante;
use App\Aviso;
use Carbon\Carbon;
class ResguardoController extends Controller
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
    public function index()
    {
        return view('rr.index', ['actividades' => Actividad::orderBy('fecha','asc')->get(), 'imagenes', FotoActividad::all()]);
    }

    public function donaciones()
    {
        return view('rr.donaciones', ['donantes'=>Donante::all()]);
    }

    public function team()
    {
        return view('rr.about', ['integrantes'=>Integrante::all()]);
    }

    public function multimedia()
    {
        return view('rr.gallery', ['multimedia'=>FotoActividad::orderBy('actividad', 'asc')->get()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        $imagenes = FotoActividad::where('actividad', $id)->get();
        return view('rr.show', ['actividad' => $actividad, 'imagenes' => $imagenes]);
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
    public function destroy($id)
    {
        //
    }
}
