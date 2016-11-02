<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Donante extends Model
{
    protected $table = "PostMedia";

    protected $fillable = ['id','label', 'contenido'];
}