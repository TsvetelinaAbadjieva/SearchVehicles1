<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Engine extends Model
{
    protected $table='engines';
    protected $fillable=['id','engine_type'];


}
