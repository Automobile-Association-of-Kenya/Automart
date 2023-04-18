<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class CarModel extends Model
{
    use HasFactory;
    public function make()
    {
      return $this->belongsTo(CarMake::class,'car_make_id','car_make_id');
    }

    /**
     * Get all of the cars for the CarModel
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function cars(): HasMany
    {
        return $this->hasMany(Caronsells::class, 'model', 'car_model_id');
    }
}
