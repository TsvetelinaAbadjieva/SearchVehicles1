<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\VehicleModel;
use App\Vehicle;

class Color extends Model
{
    protected $table='colors';
    protected $fillable=['id','color','color_name'];

    public function vehicle()
    {
        return $this->hasMany(Vehicle::class);
    }

    public function model()
    {
        return $this->hasManyThrough(VehicleModel::class,Vehicle::class,'color_id','model_id','id');
    }
    public function brand()
    {
        return $this->hasManyThrough(Brand::class,Vehicle::class,'color_id','brand_id','id');
    }
    public function engine()
    {
        return $this->hasManyThrough(Engine::class,Vehicle::class,'color_id','engine_id','id');
    }
}
