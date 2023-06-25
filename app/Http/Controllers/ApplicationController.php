<?php

namespace App\Http\Controllers;

use App\Models\Country;
use App\Models\County;
use App\Models\Finance;
use App\Models\Make;
use App\Models\Purchase;
use App\Models\Quote;
use App\Models\Services;
use App\Models\Tradein;
use App\Models\Type;
use App\Models\User;
use App\Models\Vehicle;
use App\Models\VehicleModel;
use App\Models\VehiclePrice;
use Illuminate\Http\Request;

class ApplicationController extends Controller
{
    public function __construct()
    {
        $this->country = new Country();
        $this->county = new County();
        $this->vehicle = new Vehicle();
        $this->type = new Type();
        $this->make = new Make();
        $this->model = new VehicleModel();
        $this->price = new VehiclePrice();
        $this->quote = new Quote();
        $this->tradein = new Tradein();
        $this->finance = new Finance();
        $this->user = new User();
        $this->service = new Services();
        $this->purchase = new Purchase();
        // $this->vehicleservice = new VehicleSevice();
    }

    public function welcome()
    {
        $vehicles = $this->vehicle->getlatest(9);
        $discounts = $this->vehicle->discounts(21);
        return view('welcome', compact('discounts', 'vehicles'));
    }

    public function buy($vehicle_no)
    {
        $vehicle = $this->vehicle->vehicle($vehicle_no);
        $services = $this->service->get();
        return view('vehicles.buy', compact('vehicle', 'services'));
    }

    public function purchase(Request $request) {
        $validated = $request->validate(['vehicle_id' => ['required','exists:vehicles,id'],'name' => ['required','max:80'],'id_no' => ['required','max:10'],'phone' => ['required','max:16'],'email' => ['required','max:80'],'pickup' => ['required','max:80'],'estate' => ['nullable','max:80'],'housenumber' => ['nullable','max:80'],'payment_method' => ['required','max:80']]);
        $purchase = $this->purchase->create([$validated+['user_id'=>auth()->id()??null]]);
        return json_encode(['status'=>'success', 'message'=>'Purchase request captured successfully']);
    }

    public function loan($vehicle_no)
    {
        $vehicle = $this->vehicle->vehicle($vehicle_no);
        $services = $this->service->get();
        return view('vehicles.loan', compact('vehicle', 'services'));
    }

    public function dashboard()
    {
        return $this->user->redirect();
    }

    function index()
    {
        $vehicles = $this->vehicle->getvehiclespaginate(40);
        return view('index', compact('vehicles'));
    }

    public function latest()
    {
        $vehicles = $this->vehicle->latest(9);
        return json_encode($vehicles);
    }

    public function countries()
    {
        $countries = $this->country->get();
        return json_encode($countries);
    }

    public function counties($country_id = null)
    {
        $query = $this->county->query();
        if (!is_null($country_id)) {
            $query->where('country_id', $country_id);
        }
        $counties = $query->select('id', 'name')->get();

        return json_encode($counties);
    }

    public function new()
    {
        return view('vehicles.vehicles');
    }

    public function vehiclesLatest()
    {
        $newarrivals = $this->vehicle
            ->with(['dealer' => function ($dealer) {
                return $dealer->select('id', 'name');
            }, 'type' => function ($type) {
                return $type->select('id', 'type');
            }, 'make' => function ($make) {
                return $make->select('id', 'make');
            }, 'model' => function ($model) {
                return $model->select('id', 'model');
            }, 'prices'])->orderBy('created_at', 'DESC')->limit(100)->get();
        return json_encode($newarrivals);
    }

    public function vehicleTypesWithVehicles()
    {
        $types = $this->type->whereHas('vehicles')->withCount('vehicles')->orderBy('vehicles_count', 'desc')->limit(10)->get();
        return json_encode($types);
    }

    public function makesWithVehicles()
    {
        $makes = $this->make->whereHas('vehicles')->withCount('vehicles')->orderBy('vehicles_count', 'desc')->limit(30)->get();
        return json_encode($makes);
    }

    public function modelsWithVehicles()
    {
        $models = $this->model->whereHas('vehicles')->withCount('vehicles')->orderBy('vehicles_count', 'desc')->limit(15)->get();
        return json_encode($models);
    }

    public function vehicleTypes($id = null)
    {
        $type = $this->type->find($id);
        $vehicles = $this->vehicle->where('type_id', $type->id)
            ->with(['dealer' => function ($dealer) {
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
        // return $vehicles;
        return view('vehicles.types', compact('type', 'vehicles'));
    }

    public function vehicleSearch(Request $request)
    {
        $query = $this->vehicle->query();
        if (!is_null($request->type_id)) {
            $query->where('type_id', $request->type_id);
        }
        if (!is_null($request->make_id)) {
            $query->where('make_id', $request->make_id);
        }
        if (!is_null($request->year)) {
            $query->where('year', $request->year);
        }
        if (!is_null($request->county_id)) {
            $query->where('county_id', $request->county_id);
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
        }])->paginate(20);

        return json_encode($vehicles);
    }

    public function search(Request $request)
    {
        $vehicles = $this->vehicle->searchpaginate($request, 20);

        return view('vehicles.search', compact('vehicles'));
    }

    public function vehicleModels($id)
    {
        $model = $this->model->find($id);

        $vehicles = $this->vehicle->where('vehicle_model_id', $model->id)
            ->with(['dealer' => function ($dealer) {
                return $dealer->select('id', 'name');
            }, 'type' => function ($type) {
                return $type->select('id', 'type');
            }, 'make' => function ($make) {
                return $make->select('id', 'make');
            }, 'model' => function ($model) {
                return $model->select('id', 'model');
            }, 'prices' => function ($price) {
                return $price->select('price');
            }])->paginate(20);

        return view('vehicles.models', compact('model', 'vehicles'));
    }

    public function vehicleMakes($id)
    {
        $make = $this->make->find($id);
        $vehicles = $this->vehicle->vehiclesbymake($id, 20);
        return view('vehicles.makes', compact('vehicles', 'make'));
    }

    function like($id)
    {
        return $this->vehicle->liked($id);
    }

    function view($id)
    {
        return $this->vehicle->viewed($id);
    }

    function whatsapp($id)
    {
        return $this->vehicle->whatsapp($id);
    }

    public function newArrivals()
    {
        $vehicles = $this->vehicle->getvehiclespaginate(9);
        return json_encode($vehicles);
    }

    public function newVehicles()
    {
        $vehicles = $this->vehicle->newvehiclespaginated(20);
        return view('vehicles.new', compact('vehicles'));
    }

    public function discountedVehicles()
    {
        $vehicles = $this->vehicle->discounts(21);
        return view('vehicles.discount', compact('vehicles'));
    }

    public function vehicle($id)
    {
        $vehicle = $this->vehicle->vehilclebyid($id);
        $this->vehicle->viewed($vehicle->id);
        return json_encode($vehicle);
    }

    public function vehicleDetails($id, $param = null)
    {
        $vehicle = $this->vehicle->vehicle($id);
        if ($param == "discount") {
            $relatedvehicles = $this->vehicle->discountedrelated($vehicle->id ?? $vehicle->vehicle_no);
        }elseif ($param == "latest") {
            $relatedvehicles = $this->vehicle->latestrelated($vehicle->id);
        } else {
            $relatedvehicles = $this->vehicle->getRelatedVehicles($vehicle);
        }
        $this->vehicle->viewed($vehicle->id);
        return view('vehicles.show', compact('vehicle', 'relatedvehicles'));
    }

    public function about()
    {
        return view('about');
    }

    public function contact()
    {
        return view('contact');
    }

    public function privacy()
    {
        return view('privacy');
    }

    public function getRequests()
    {
        $tradeins = $this->tradein->count();
        $quotes = $this->quote->count();
        $finances = $this->finance->count();
        return ['tradeins' => $tradeins, 'quotes' => $quotes, 'finances' => $finances];
    }
}
