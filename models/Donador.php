<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Donante extends Model
{
    protected $table = "Donadores";

    protected $fillable = ['id','nombre', 'imagen'];
}