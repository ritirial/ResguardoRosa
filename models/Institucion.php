<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Donante extends Model
{
    protected $table = "Instituciones";

    protected $fillable = ['id','direccion', 'telefono'];
}