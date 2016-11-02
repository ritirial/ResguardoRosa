<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Actividad extends Model
{
    protected $table = "Actividades";

    protected $fillable = ['id', 'titulo', 'descripcion', 'seccion'];

    public function fotos()
    {
    	return $this->hasMany(FotoActividad::class, 'actividad');
    }

    public function seccion()
    {
    	return $this->belongsTo('App\Seccion', 'id');
    }
}
