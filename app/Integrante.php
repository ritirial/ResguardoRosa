<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Integrante extends Model
{
    protected $table = "Integrantes";

    protected $fillable = ['nombre', 'descripcion', 'foto'];
}
