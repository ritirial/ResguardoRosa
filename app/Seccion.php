<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Seccion extends Model
{
    protected $table = "Secciones";

    protected $fillable = ['id', 'titulo', 'descripcion'];

    public function actividades()
    {
    	return $this->hasMany('App\Actividad');
    }
}
