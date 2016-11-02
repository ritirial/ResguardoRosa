<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FotoActividad extends Model
{

	protected $table = "FotosActividades";

    protected $fillable = ['id','ruta', 'actividad'];
    
    public function actividad()
    {
    	return $this->belongsTo('App\Actividad', 'actividades', 'id', 'actividad');
    }
}
