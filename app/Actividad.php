<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Actividad extends Model
{
    protected $table = "Actividades";

    protected $fillable = ['id', 'titulo', 'descripcion', 'fecha'];

    protected $dates = ['created_at','updated_at','fecha'];

    public function fotos()
    {
    	return $this->hasMany(FotoActividad::class, 'actividad');
    }
}
