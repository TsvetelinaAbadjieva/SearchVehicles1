<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Brand;
use App\VehicleModel;
use App\Engine;
use App\Color;

class Vehicle extends Model
{
    protected $table='brands_colors_engines_models';
    protected $fillable=['id','price','photo','brand_id','model_id','engine_id','color_id','created_at','updated_at'];
    //protected $photo;
    //protected $price;
    public function brand(){
        return $this->belongsTo(Brand::class);
    }
    public function model(){
        return $this->belongsTo(VehicleModel::class);
    }
    public function engine(){
        return $this->belongsTo(Engine::class);
    }
    public function color(){
        return $this->belongsTo(Color::class);
    }
    public function photo(){
        return $this->photo;
    }
    public function price(){
        return $this->price;
    }
}
