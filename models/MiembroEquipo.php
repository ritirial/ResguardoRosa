<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Donante extends Model
{
    protected $table = "MiembrosEquipo";

    protected $fillable = ['id','nombre', 'imagen','descripcion'];
}