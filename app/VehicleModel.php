<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class VehicleModel extends Model
{
    protected $table='models';
    protected $fillable=['id','model','brand_id'];
    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }
}
