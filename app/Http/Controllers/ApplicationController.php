<?php

namespace App\Http\Controllers;

use App\Models\Country;
use App\Models\County;
use App\Models\Finance;
use App\Models\Make;
use App\Models\Quote;
use App\Models\Tradein;
use App\Models\Type;
use App\Models\Vehicle;
use App\Models\VehicleModel;
use App\Models\VehiclePrice;
use App\Service\VehicleSevice;
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

        // $this->vehicleservice = new VehicleSevice();
    }

    public function welcome()
    {
        $discounts = $this->vehicle->discountedVehicles();
        return view('welcome', compact('discounts'));
    }

    public function dashboard()
    {
        if (auth()->user()) {
            if (auth()->user()->role === "dealer") {
                return redirect()->route('dealers.index');
            } elseif (auth()->user()->role === "admin") {
                $vehicles = $this->vehicle->count();
                $summary = $this->getRequests();
                return view('dashboard.index', compact('vehicles', 'summary'));
            } elseif (auth()->user()->role === "buyer") {
                return redirect()->route('profile');
            } elseif (auth()->user()->role === "partner") {
                return redirect()->route('profile');
            }
        } else {
            return redirect()->route('login');
        }
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
        $query = $this->vehicle->query();
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

        $vehicles = $this->vehicle->where('make_id', $make->id)
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

        return view('vehicles.makes', compact('vehicles', 'make'));
    }

    public function newArrivals()
    {
        $vehicles = $this->vehicle
            ->with(['dealer' => function ($dealer) {
                $dealer->select('id', 'name');
            }, 'type' => function ($type) {
                $type->select('id', 'type');
            }, 'make' => function ($make) {
                $make->select('id', 'make');
            }, 'model' => function ($model) {
                $model->select('id', 'model');
            }, 'prices' => function ($price) {
                $price->select('price');
            }])->latest()->paginate(6);

        return json_encode($vehicles);
    }

    public function newVehicles()
    {
        $vehicles = $this->vehicle
            ->with(['dealer' => function ($dealer) {
                $dealer->select('id', 'name');
            }, 'type' => function ($type) {
                $type->select('id', 'type');
            }, 'make' => function ($make) {
                $make->select('id', 'make');
            }, 'model' => function ($model) {
                $model->select('id', 'model');
            }, 'prices' => function ($price) {
                $price->select('price');
            }])->latest()->paginate(20);

        return view('vehicles.new', compact('vehicles'));
    }

    public function discountedVehicles()
    {
        $discountedvehicles = $this->vehicle->discountedVehicles();
        return view('vehicles.discount', compact('discountedvehicles'));
    }

    public function vehicle($id)
    {
        $vehicle = $this->vehicle
            ->with(['dealer' => function ($dealer) {
                return $dealer->select('id', 'name');
            }, 'type' => function ($type) {
                return $type->select('id', 'type');
            }, 'make' => function ($make) {
                return $make->select('id', 'make');
            }, 'model' => function ($model) {
                return $model->select('id', 'model');
            }, 'prices' => function ($query) {
                return $query->select('id', 'price');
            }, 'yard' => function ($yard) {
                return $yard->select('id', 'yard');
            }, 'features' => function ($fea) {
                return $fea->select('features.id', 'features.feature');
            }])->find($id);

        return json_encode($vehicle);
    }

    public function vehicleDetails($id)
    {
        $vehicle = $this->vehicle
            ->with(['dealer' => function ($dealer) {
                return $dealer->select('id', 'name');
            }, 'type' => function ($type) {
                return $type->select('id', 'type');
            }, 'make' => function ($make) {
                return $make->select('id', 'make');
            }, 'model' => function ($model) {
                return $model->select('id', 'model');
            }, 'prices' => function ($query) {
                return $query->select('id', 'price');
            }, 'yard' => function ($yard) {
                return $yard->select('id', 'yard');
            }, 'features' => function ($fea) {
                return $fea->select('features.id', 'features.feature');
            }])->find($id);

        $relatedvehicles = $this->vehicle->getRelatedVehicles($vehicle);

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
        return ['tradeins'=>$tradeins, 'quotes' => $quotes, 'finances'=>$finances];
    }

    public function requests()
    {
        $quotes = $this->quote->with('vehicle')->latest()->get();
        $tradeins = $this->tradein->with('vehicle')->latest()->get();
        $finances = $this->finance->with('vehicle')->latest()->get();
        return view('admin.requests', compact('quotes', 'tradeins', 'finances'));
    }
}
