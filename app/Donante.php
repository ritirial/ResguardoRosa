<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Donante extends Model
{
    protected $table = "Donantes";

    protected $fillable = ['nombre', 'descripcion', 'logo'];
}
