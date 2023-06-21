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

    protected $with = ['make:id,make', 'model:id,model', 'dealer:id,name,phone,email'];

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
        $vehicles = $query->with(['dealer:id,name', 'type:id,type', 'make:id,make', 'model:id,model', 'prices'])->limit(10)->get();
        return $vehicles;
    }

    function vehicle($vehicle_no)
    {
        $vehicle = $this->where('vehicle_no', $vehicle_no)
            ->orWhere('id', $vehicle_no)->with([
                'dealer:id,name',
                'type:id,type',
                'make:id,make',
                'model:id,model',
                'yard'
            ])->first();
        return $vehicle;
    }

    public function vehilclebyid($id)
    {
        $vehicle = $this->where('id', $id)
            ->with(['dealer:id,name', 'type:id,type', 'make:id,make', 'model:id,model', 'prices:id,price', 'yard:id,yard,address', 'features:id,feature'])
            ->first();
        return $vehicle;
    }

    public function discounts($limit, $vehicle_id = null)
    {
        $query = $this->query();
        if (!is_null($vehicle_id)) {
            $query->where('id','!=', $vehicle_id)->orWhere('vehicle_no','!=',$vehicle_id);
        }
        $discountedVehicles = $query->where('status', '!=', 'sold')->with([
            'dealer:id,name',
            'type:id,type',
            'make:id,make',
            'model:id,model',
            'yard'
        ])
            ->whereHas('prices', function ($query) {
                $query->select('vehicle_id')
                    ->groupBy('vehicle_id')
                    ->havingRaw('COUNT(*) > 1')
                    ->orderByDesc('created_at')
                    ->limit(2);
            })
            ->get()
            ->filter(function ($vehicle) {
                $prices = $vehicle->prices;
                if ($prices->count() > 1 && $prices[0]->price < $prices[1]->price) {
                    $vehicle['current_price'] = $prices[0]->price;
                    $vehicle['initial_price'] = $prices[1]->price;
                    return true;
                }
                return false;
            });
        return $discountedVehicles;
    }

    public function discountedrelated($vehicle_id)
    {
        $vehicles = $this->discounts(10, $vehicle_id);
        return $vehicles;
    }

    /**
     * Get the user that owns the Vehicle
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function getvehiclespaginate($paginate)
    {

        $newarrivals = $this->with(['dealer:id,name', 'type:id,type', 'make:id,make', 'model:id,model', 'prices:id,price'])->latest()->paginate($paginate);
        return json_encode($newarrivals);
    }

    public function getlatest($limit,$except_id=null)
    {
        $query = $this->query();
        if (!is_null($except_id)) {
            $query->where('id','!=',$except_id)->orWhere('vehicle_no','!=',$except_id);
        }
        $newarrivals = $query->with(['dealer:id,name', 'type:id,type', 'make:id,make', 'model:id,model'])->limit($limit)->get();
        return $newarrivals;
    }

    function latestrelated($except_id) {
        return $this->getlatest($except_id);
    }

    function newvehiclespaginated($paginate)
    {
        $newvehicles = $this->with(['dealer:id,name', 'type:id,type', 'make:id,make', 'model:id,model'])->paginate($paginate);
        return $newvehicles;
    }

    function vehiclesbymake($make_id, $paginate)
    {
        $vehicles = $this->where('make_id', $make_id)->with(['dealer:id,name', 'type:id,type', 'make:id,make', 'model:id,model', 'prices:id,price'])->latest()->paginate($paginate);
        return $vehicles;
    }

    function user_id()
    {
        return auth()->user() ? auth()->user()->id : NULL;
    }

    function viewed($id)
    {
        if (!is_null($this->user_id())) {
            View::create(['user_id' => $this->user_id, 'vehicle_id' => $id]);
        } else {
            View::create(['vehicle_id' => $id]);
        };
        return json_encode(['status' => 'success']);
    }

    function vehiclecontactphone($id)
    {
        $vehicle = $this->where('id', $id)->with(['user:id,phone', 'dealer:id,phone'])->first();
        $phone = $vehicle->user->phone ?? $vehicle->dealer->phone;
        return "+254" . substr($phone, -9);
    }

    function whatsapp($id)
    {
        $vehicle = $this->where('id', $id)->with(['make:id,make', 'model:id,model'])->first();
        $social = Social::where('name', 'whatsapp')->first();
        $phone = $this->vehiclecontactphone($id);
        $message = "Hello! I have checked  " . $vehicle->year . " " . $vehicle->make->make . " " . $vehicle->model->model . " of ref " . $vehicle->vehicle_no . "and I'm interested. Please let me know on any requirements";
        if (!is_null($this->user_id())) {
            Messages::create(['user_id' => $this->user_id(), 'vehicle_id' => $id, 'type' => 'whatsapp', 'destination' => $this->vehiclecontactphone($id), 'message' => $message]);
        } else {
            Messages::create(['vehicle_id' => $id, 'type' => 'whatsapp', 'destination' => $phone, 'message' => $message]);
        }
        return json_encode(['status' => "success", "url" => $social->link . "?phone=" . $phone . "&text=" . $message]);
    }

    function liked($id)
    {
        if (!is_null($this->user_id())) {
            Like::create(['user_id' => $this->user_id, 'vehicle_id' => $id]);
        } else {
            Like::create(['vehicle_id' => $id]);
        };
        return json_encode(['status' => 'success']);
    }

    function searchpaginate($request)
    {
        $query = $this->query();
        if (!is_null($request->type)) {
            $query->where('type_id', $request->type);
        }
        if (!is_null($request->make)) {
            $query->where('make_id', $request->make);
        }
        if (!is_null($request->year)) {
            $query->where('year', $request->year);
        }
        if (!is_null($request->county)) {
            $query->where('county_id', $request->county);
        }
        if (!is_null($request->transmission)) {
            $query->where('transmission', $request->transmission);
        }
        if (!is_null($request->usage)) {
            $query->where('usage', $request->usage);
        }
        // if (!is_null($request->price) && !empty($request->price)) {
        //     // $query->whereBetween('price','>=',intval($request->price[0]))->where('price','<=',intval($request->price[0]));
        //     $query->whereBetween('price',$request->price);
        // }
        $vehicles = $query->with(['dealer' => function ($dealer) {
            return $dealer->select('id', 'name');
        }, 'type' => function ($type) {
            return $type->select('id', 'type');
        }, 'make' => function ($make) {
            return $make->select('id', 'make');
        }, 'model' => function ($model) {
            return $model->select('id', 'model');
        }, 'prices' => function ($price) {
            return $price->select('price');
        }])->latest()->paginate(20);
    }
}