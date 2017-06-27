<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\VehicleModel;

class Brand extends Model
{
    protected $table='brands';
    protected $fillable=['id','name','created_at','updated_at'];

    public function model()
    {
        return $this->hasMany(VehicleModel::class);
    }

}
