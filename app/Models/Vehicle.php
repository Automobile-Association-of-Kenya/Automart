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
        'engine','seats',
        'horsepower', 'status', 'sponsored', 'priority',
    ];

    public $with = ['user:id,phone','make:id,make', 'model:id,model', 'images:id,vehicle_id,image', 'dealer:id,name,phone,email', 'type:id,type', 'prices:id,price', 'yard:id,yard,address', 'features:id,feature'];

    public function dealer(): BelongsTo
    {
        return $this->belongsTo(Dealer::class, 'dealer_id');
    }

    public function images(): HasMany
    {
        return $this->hasMany(VehicleImage::class, 'vehicle_id', 'id');
    }

    public function yard(): BelongsTo
    {
        return $this->belongsTo(Yard::class, 'yard_id');
    }

    public function purchases(): HasMany
    {
        return $this->hasMany(Purchase::class, 'vehicle_id', 'id');
    }

    public function features(): BelongsToMany
    {
        return $this->belongsToMany(Feature::class, 'vehicle_feature', 'vehicle_id', 'feature_id');
    }

    public function make(): BelongsTo
    {
        return $this->belongsTo(Make::class, 'make_id');
    }

    public function model(): BelongsTo
    {
        return $this->belongsTo(VehicleModel::class, 'vehicle_model_id');
    }

    public function prices(): HasMany
    {
        return $this->hasMany(VehiclePrice::class, 'vehicle_id', 'id');
    }

    public function type(): BelongsTo
    {
        return $this->belongsTo(Type::class, 'type_id');
    }

    public function tradeins(): HasMany
    {
        return $this->hasMany(Tradein::class, 'vehicle_id', 'id');
    }

    public function quotes(): HasMany
    {
        return $this->hasMany(Quote::class, 'vehicle_id', 'id');
    }

    public function loans(): HasMany
    {
        return $this->hasMany(Loan::class, 'vehicle_id', 'id');
    }

    public function messages(): HasMany
    {
        return $this->hasMany(Messages::class, 'vehicle_id', 'id');
    }

    public function finance(): HasMany
    {
        return $this->hasMany(Finance::class, 'vehicle_id', 'id');
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
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
        $query = $this->query()->where('id','!=',intval($vehicle->id));
        if (!is_null($vehicle->type_id) && $vehicle->type_id !== "") {
            $query->where('type_id', intval($vehicle->type_id));
        }
        if (!is_null($vehicle->make_id) && $vehicle->make_id  !== "") {
            $query->where('make_id', intval($vehicle->make_id));
        }
        if (!is_null($vehicle->vehicle_model_id) && $vehicle->vehicle_model_id  !== "") {
            $query->where('vehicle_model_id', intval($vehicle->vehicle_model_id));
        }
        $vehicles = $query->limit(9)->get();
        return $vehicles;
    }

    function vehicle($vehicle_no)
    {
        $vehicle = $this->where('vehicle_no', $vehicle_no)
            ->orWhere('id', $vehicle_no)->first();
        return $vehicle;
    }

    public function vehilclebyid($id)
    {
        $vehicle = $this->where('id', $id)->orWhere('vehicle_no', $id)->first();
        return $vehicle;
    }

    public function discounts($vehicle_id = null)
    {
        $query = $this->query();
        if (!is_null($vehicle_id)) {
            $query->where('id', '!=', $vehicle_id)->orWhere('vehicle_no', '!=', $vehicle_id);
        }
        $discountedVehicles = $query->where('status', '!=', 'sold')->whereHas('prices', function ($query) {
                $query->select('vehicle_id')
                    ->groupBy('vehicle_id')
                    ->havingRaw('COUNT(*) > 1')
                    ->latest()
                    ->limit(2);
            })->inRandomOrder()->orderBy('priority')->get()
            ->filter(function ($vehicle) {
                $prices = $vehicle->prices;

                if ($prices->count() > 1 && $prices->last()->price < $prices[1]->price) {
                    $vehicle['current_price'] = $prices[0]->price;
                    $vehicle['initial_price'] = $prices[1]->price;
                    return true;
                }
                return false;
            });
        return $discountedVehicles;
    }

    public function sortbyprices($start,$end) {
        $query = $this->query();
        $query->where('price','>=',intval($start));
        if (!empty($end)) {
            $query = $query->where('price','<=',intval($end));
        }
        $vehicles = $query->inRandomOrder()->orderBy('priority')->latest()->paginate(20);
        return $vehicles;
    }

    public function discountedrelated($vehicle_id)
    {
        $vehicles = $this->discounts(10, $vehicle_id);
        return $vehicles;
    }


    public function getvehiclespaginate($paginate)
    {
        $vehicles = $this->inRandomOrder()->orderBy('priority')->latest()->paginate($paginate);
        return json_encode($vehicles);
    }

    public function getlatest($limit, $except_id = null)
    {
        $query = $this->query();
        if (!is_null($except_id)) {
            $query->where('id', '!=', $except_id)
            ->where('vehicle_no', '!=', $except_id);
        }
        $newarrivals = $query->latest()->inRandomOrder()->orderBy('priority')->limit($limit)->get();
        return $newarrivals;
    }

    function latestrelated($except_id)
    {
        return $this->getlatest(10,$except_id);
    }

    function newvehiclespaginated($paginate)
    {
        $newvehicles = $this->where('usage', 'new')->inRandomOrder()->orderBy('priority')->paginate($paginate);
        return $newvehicles;
    }

    function vehiclesbymake($make_id, $paginate)
    {
        $vehicles = $this->where('make_id', intval($make_id))->inRandomOrder()->orderBy('priority')->latest()->paginate($paginate);
        return $vehicles;
    }

    function userID()
    {
        return (auth()->user()) ? auth()->user()->id : NULL;
    }

    function viewed($id)
    {
        $vehicle = $this->find($id);
        $vehicle->update(['views'=>$vehicle->views++]);
        if (!is_null($this->userID())) {
            View::create(['user_id' => $this->userID(), 'vehicle_id' => $id]);
        } else {
            View::create(['vehicle_id' => $id]);
        };
        return json_encode(['status' => 'success']);
    }

    function vehiclecontactphone($id)
    {
        $vehicle = $this->where('id', $id)->first();
        $phone = $vehicle->user->phone ?? $vehicle->dealer->phone;
        return "+254" . substr($phone, -9);
    }

    function whatsapp($id)
    {
        $vehicle = $this->where('id', $id)->with(['make:id,make', 'model:id,model'])->first();
        $social = Social::where('name', 'whatsapp')->first();
        $phone = $this->vehiclecontactphone($id);
        $message = "Hello! I have checked  " . $vehicle->year . " " . $vehicle->make->make . " " . $vehicle->model->model . " of ref " . $vehicle->vehicle_no . "and I'm interested. Please let me know on any requirements";

        if (!is_null($this->userID())) {
            Messages::create(['user_id' => $this->userID(), 'vehicle_id' => $id, 'type' => 'whatsapp', 'destination' => $this->vehiclecontactphone($id), 'message' => $message]);
        } else {
            Messages::create(['vehicle_id' => $id, 'type' => 'whatsapp', 'destination' => $phone, 'message' => $message]);
        }
        return json_encode(['status' => "success", "url" => $social->link . "?phone=" . $phone . "&text=" . $message]);
    }

    function liked($id)
    {
        $vehicle = $this->find($id);
        $vehicle->update(['likes'=>$vehicle->likes++]);
        if (!is_null($this->userID())) {
            Like::create(['user_id' => $this->user_id, 'vehicle_id' => $id]);
        } else {
            Like::create(['vehicle_id' => $id]);
        };
        return json_encode(['status' => 'success']);
    }

    function searchprefix($data)
    {
        $query = $this->query();
        if (isset($data["type"]) && !is_null($data["type"])) {
            $query->where('type_id', $data["type"]);
        }
        if (isset($data["make"]) && !is_null($data["make"])) {
            $query->where('make_id', $data["make"]);
        }
        if (isset($data["year"]) && !is_null($data["year"])) {
            $query->where('year', $data["year"]);
        }
        if (isset($data["model"]) && !is_null($data["model"])) {
            $query->where('vehicle_model_id', $data["model"]);
        }
        if (isset($data["transmission"]) && !is_null($data["transmission"])) {
            $query->where('transmission', $data["transmission"]);
        }
        if (isset($data["usage"]) && !is_null($data["usage"])) {
            $query->where('usage', $data["usage"]);
        }
        if (!is_null($data["min_price"])) {
            $query->where('price', '>=', floatval($data["min_price"]));
        }
        if (!is_null($data["max_price"])) {
            $query->where('price', '<=', floatval($data["max_price"]));
        }
        return $query;
    }

    function relate($data)
    {
        return $this->searchprefix($data);
    }

    function searchpaginate($data, $query, $paginate = 20)
    {
        return $this->relate($data)->inRandomOrder()->orderBy('priority')->latest()->paginate($paginate)->appends($query);
    }

    function search($data)
    {
        return $this->relate($data)->inRandomOrder()->orderBy('priority')->latest()->get();
    }

    function initialize() {
        $query = $this->query();
        if (auth()->user()->role !== "admin") {
            if (!is_null(auth()->user()->dealer_id)) {
                $query->where('dealer_id',auth()->user()->dealer_id);
            }else {
                $query->where('user_id',auth()->id());
            }
        }
        return $query;
    }

    function highend($limit) {
        $vehicles = $this->where('status','!=','sold')->orderBy('price','DESC')->limit($limit)->get();
        return $vehicles;
    }
}
