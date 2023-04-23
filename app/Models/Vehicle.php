<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Vehicle extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id', 'dealer_id', 'type_id', 'make_id', 'vehicle_model_id', 'contry_of_origin', 'country_located', 'county_id', 'vehicle_no', 'shipping_to', 'year', 'price', 'color', 'miles', 'enginecc', 'interior', 'fuel_type', 'transmission', 'description', 'cover_photo', 'images', 'tags', 'views', 'likes', 'dislikes',
    ];

    /**
     * Get all of the features for the Vehicle
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function features(): HasMany
    {
        return $this->hasMany(Feature::class, 'vehicle_id', 'id');
    }

    /**
     * Get the make that owns the Vehicle
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function make(): BelongsTo
    {
        return $this->belongsTo(Make::class, 'make_id');
    }

    /**
     * Get the model that owns the Vehicle
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function model(): BelongsTo
    {
        return $this->belongsTo(VehicleModel::class, 'vehicle_model_id');
    }
}
