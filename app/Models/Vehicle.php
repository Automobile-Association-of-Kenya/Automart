<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Facades\DB;

class Vehicle extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id', 'dealer_id', 'type_id', 'make_id', 'vehicle_model_id', 'country_of_origin', 'country_located', 'county_id', 'vehicle_no', 'shipping_to', 'year', 'price', 'color', 'mileage', 'enginecc', 'interior', 'fuel_type', 'transmission', 'description', 'cover_photo', 'images', 'tags', 'views', 'likes', 'dislikes','yard_id',
    ];

    /**
     * Get the dealer that owns the Vehicle
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function dealer(): BelongsTo
    {
        return $this->belongsTo(Dealer::class, 'dealer_id');
    }

    /**
     * Get the yard that owns the Vehicle
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function yard(): BelongsTo
    {
        return $this->belongsTo(Yard::class, 'yard_id');
    }

    /**
     * Get all of the features for the Vehicle
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    // public function features(): HasMany
    // {
    //     return $this->hasMany(Feature::class, 'vehicle_id', 'id');
    // }

    /**
     * The features that belong to the Vehicle
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function features(): BelongsToMany
    {
        return $this->belongsToMany(Feature::class, 'vehicle_feature', 'vehicle_id', 'feature_id');
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

    /**
     * Get all of the prices for the Vehicle
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function prices(): HasMany
    {
        return $this->hasMany(VehiclePrice::class, 'vehicle_id', 'id');
    }

    /**
     * Get the type that owns the Vehicle
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function type(): BelongsTo
    {
        return $this->belongsTo(Type::class, 'type_id');
    }

    public function addfeatures($id, $features)
    {
        foreach ($features as $value) {
            DB::table('vehicle_feature')->insert([
                'vehicle_id' => $id,
                'feature_id' => $value,
            ]);
        }
    }

    public function updatefeatures($id, $features)
    {
        $vehiclefeatures = DB::table('vehicle_feature')->where('vehicle_id', $id)->pluck('feature_id');
        if (!empty($vehiclefeatures)) {
            foreach ($vehiclefeatures as $value) {
                if (!in_array($value, $features)) {
                    DB::table('vehicle_feature')->where('vehicle_id', $id)->where('feature_id', $value)->delete();
                }
            }
        }

        foreach ($features as $key => $value) {
            $feature = DB::table('vehicle_feature')->where('vehicle_id',$id)->where('feature_id',$value)->first();
            if (empty($feature) || is_null($feature)) {
                DB::table('vehicle_feature')->insert([
                    'vehicle_id' => $id,
                    'feature_id' => $value,
                ]);
            }
        }
    }

}
