<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Caronsells extends Model
{
    use HasFactory;

    // In your model
public function getImagePathAttribute()
{
    return url('public/images/' . $this->filename);
}
public function carmake()
{
    return $this->belongsTo(CarMake::class,'make','car_make_id');
}
public function carmodel()
{
    return $this->belongsTo(CarModel::class,'model','car_model_id');
}
}
