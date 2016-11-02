<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Aviso extends Model
{
    protected $table = "Avisos";

    protected $fillable = ['titulo', 'descripcion', 'foto'];
}
