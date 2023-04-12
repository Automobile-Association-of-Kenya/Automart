<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Caronsells extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id', 'title', 'country', 'county', 'make', 'model', 'year', 'price', 'miles', 'enginecc', 'exterior', 'interior', 'fuel_type', 'features', 'transmission', 'vehicle_type', 'description', 'images', 'carId', 'trans_id', 'package', 'first_name', 'last_name', 'email', 'phone', 'deal_slideshow', 'cover_photo', 'usage', 'views', 'approved'
    ];

    public function getImagePathAttribute()
    {
        return url('public/images/' . $this->filename);
    }
    public function carmake()
    {
        return $this->belongsTo(CarMake::class, 'make', 'car_make_id');
    }
    public function carmodel()
    {
        return $this->belongsTo(CarModel::class, 'model', 'car_model_id');
    }

    public function updateviews()
    {
        $this->views++;
        $this->update();
    }
}
