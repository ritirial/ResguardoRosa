<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Donante extends Model
{
    protected $table = "Posts";

    protected $fillable = ['id','fecha', 'contenido'];
}