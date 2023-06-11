<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\DB;

class Vehicle extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'user_id', 'dealer_id', 'type_id', 'make_id', 'vehicle_model_id', 'country_of_origin', 'country_located', 'county_id', 'vehicle_no', 'shipping_to', 'year', 'price', 'color', 'mileage', 'enginecc', 'interior', 'fuel_type', 'transmission', 'description', 'cover_photo', 'images', 'tags', 'usage', 'views', 'likes', 'dislikes', 'yard_id', 'gear',
        'speed',
        'terrain',
        'engine',
        'horsepower',
    ];

    protected $with = ['make:id,make','model:id,model','dealer:id,name,phone,email'];

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

    /**
     * Get all of the tradeins for the Vehicle
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function tradeins(): HasMany
    {
        return $this->hasMany(Tradein::class, 'vehicle_id', 'id');
    }

    /**
     * Get all of the quotes for the Vehicle
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function quotes(): HasMany
    {
        return $this->hasMany(Quote::class, 'vehicle_id', 'id');
    }

    /**
     * Get all of the finance for the Vehicle
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function finance(): HasMany
    {
        return $this->hasMany(Finance::class, 'vehicle_id', 'id');
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
                if (!in_array($value, array_map('intval', $features))) {
                    DB::table('vehicle_feature')->where('vehicle_id', $id)->where('feature_id', $value)->delete();
                }
            }
        }

        foreach ($features as $key => $value) {
            $feature = DB::table('vehicle_feature')->where('vehicle_id', $id)->where('feature_id', $value)->first();
            if (empty($feature) || is_null($feature)) {
                DB::table('vehicle_feature')->insert([
                    'vehicle_id' => $id,
                    'feature_id' => $value,
                ]);
            }
        }
    }

    public function getRelatedVehicles($vehicle)
    {
        $query = $this->query();
        $query->where('id', '!==', $vehicle->id);
        if (!is_null($vehicle->type_id)) {
            $query->where('type_id', $vehicle->type_id);
        }
        if (!is_null($vehicle->make_id)) {
            $query->where('make_id', $vehicle->make_id);
        }
        if (!is_null($vehicle->vehicle_model_id)) {
            $query->where('vehicle_model_id', $vehicle->vehicle_model_id);
        }
        $vehicles = $query->with(['dealer' => function ($dealer) {
            $dealer->select('id', 'name');
        }, 'type' => function ($type) {
            $type->select('id', 'type');
        }, 'make' => function ($make) {
            $make->select('id', 'make');
        }, 'model' => function ($model) {
            $model->select('id', 'model');
        }, 'prices' => function ($price) {
            $price->select('price');
        }])->limit(10)->get();

        return $vehicles;
    }

    public function discountedVehicles()
    {
        $vehicles = $this->with(['dealer' => function ($dealer) {
            $dealer->select('id', 'name');
        }, 'type' => function ($type) {
            $type->select('id', 'type');
        }, 'make' => function ($make) {
            $make->select('id', 'make');
        }, 'model' => function ($model) {
            $model->select('id', 'model');
        }, 'yard'])->get();
        $discountedvehicles = [];
        foreach ($vehicles as $key => $value) {
            $prices = VehiclePrice::where('vehicle_id', $value->id)->latest()->get();
            if (!empty($prices) && $prices->count() > 1) {
                $first = $prices->first();
                $last = $prices[1];
                if ($first->price < $last->price) {
                    $value['current_price'] = $first->price;
                    $value['initial_price'] = $last->price;
                    array_push($discountedvehicles, $value);
                }
            }
        }
        return $discountedvehicles;
    }
}
