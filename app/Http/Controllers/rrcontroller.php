<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\FotoActividad;
use App\Integrante;
use App\Seccion;
use App\Actividad;
use App\Donante;
use App\Aviso;
class rrcontroller extends Controller
{
    public function index(){
    	return view('rr.index', ['img'=>"/slider.jpg", 'imagenes'=>FotoActividad::all(), 'integrantes'=>Integrante::all(), 'secciones'=>Seccion::all(), 'donantes'=>Donante::all(), 'avisos'=>Aviso::all()]);)
    }
}
