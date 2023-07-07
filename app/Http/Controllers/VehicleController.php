<?php

namespace App\Http\Controllers;

use App\Http\Requests\VehicleRequest;
use App\Models\Dealer;
use App\Models\Feature;
use App\Models\Make;
use App\Models\Type;
use App\Models\Vehicle;
use App\Models\VehicleImage;
use App\Models\VehicleModel;
use App\Models\VehiclePrice;
use App\Models\Yard;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;

class VehicleController extends Controller
{
    public function __construct()
    {
        // $this->middleware('auth');
        $this->vehicle = new Vehicle();
        $this->make = new Make();
        $this->model = new VehicleModel();
        $this->dealer = new Dealer();
        $this->type = new Type();
        $this->feature = new Feature();
        $this->auth = auth()->user();
        $this->yard = new Yard();
    }


    public function discounts()
    {
        $discounts = $this->vehicle->discounts();
        return json_encode($discounts);
    }

    public function makes($id = null)
    {
        $query = $this->make->query();
        if (!is_null($id)) {
            $query->where('id', $id);
        }
        $makes = $query->withCount('vehicles')->orderBy('vehicles_count','desc')->get();

        return json_encode($makes);
    }

    public function makeCreate(Request $request)
    {
        $validated = $request->validate(['make' => ['required', 'max:80']]);
        $fileName = "";
        if ($request->hasFile('logo')) {
            $logo = $request->file('logo');
            $fileName .= uniqid() . '.' . $logo->getClientOriginalExtension();
            $logo->move("brands/", $fileName);
        }
        $validated["logo"] = $fileName;

        if (!is_null($request->make_id)) {
            $make = $this->make->find($request->make_id);
            $make->update($validated);
            return json_encode(['status' => 'success', 'message' => 'Make updated successfully']);
        } else {
            $this->make->create($validated);
            return json_encode(['status' => 'success', 'message' => 'Make added successfully']);
        }
    }

    public function models($make_id = null)
    {
        $query = VehicleModel::query();
        if ($make_id !== "null" && $make_id !== null) {
            $query->where('make_id', $make_id);
        }
        $models = $query->with('make')->withCount('vehicles')->orderBy('vehicles_count','desc')->get();

        return json_encode($models);
    }

    public function model($id)
    {
        $model = $this->model->with('make')->find($id);
        return json_encode($model);
    }

    public function modelCreate(Request $request)
    {
        $validated = $request->validate(['make_id' => ['required', 'exists:makes,id'], 'model' => ['required', 'max:60']]);
        if (!is_null($request->model_id)) {
            $model = $this->model->find($request->model_id);
            $model->update($validated);
            return json_encode(['status' => 'success', 'message' => 'Model updated successfully']);
        } else {
            $this->model->create($validated);
            return json_encode(['status' => 'success', 'message' => 'Model added successfully']);
        }
    }

    public function types($id = null)
    {
        $query = $this->type->query();
        if (!is_null($id)) {
            $query->where('id', $id);
        }
        $types = $query->select('id', 'type')->get();

        return json_encode($types);
    }

    public function typeCreate(Request $request)
    {
        $validated = $request->validate(['type' => ['required']]);
        if (!is_null($request->type_id)) {
            $type = $this->type->find($request->type_id);
            $type->update($validated);
        } else {
            $this->type->create($validated);
        }
        return json_encode(['status' => 'success', 'message' => 'Vehicle type added successfully']);
    }

    public function features($id = null)
    {
        $query = $this->feature->query();
        if (!is_null($id) && $id !== "null") {
            $query->where('id', $id);
        }
        $features = $query->select('id', 'feature', 'description')->get();

        return json_encode($features);
    }

    public function featureCreate(Request $request)
    {
        $validated = $request->validate(['feature' => ['required', 'max:80'], 'description' => ['nullable', 'max:255']]);
        if (!is_null($request->feature_id)) {
            $feature = $this->feature->find($request->feature_id);
            $feature->update($validated);
        } else {
            $this->feature->create($validated);
        }
        return json_encode(['status' => 'success', 'message' => 'Feature added successfully']);
    }

    public function list()
    {
        $vehicles = $this->vehicle->with(['make', 'model'])->latest()->get();
        return json_encode($vehicles);
    }

    public function listVehicles()
    {
        $vehicles = $this->vehicle->latest()->get();
        return json_encode($vehicles);
    }

    public function show($id)
    {
        $vehicle = $this->vehicle
            ->with('dealer:id,name', 'user:id,name', 'type:id,type', 'make:id,make', 'model:id,model', 'prices:id,price', 'yard:id,yard', 'features:id,feature', 'tradeins', 'quotes', 'loans', 'messages')->find($id);
        return json_encode($vehicle);
    }


    public function yards($id = null)
    {
        $query = $this->yard->query();
        if (!is_null($id)) {
            $query->where('id', $id);
        }
        if (auth()->user()->role === "dealer") {
            $query->where('dealer_id', auth()->user()->dealer_id);
        }
        $yards = $query->with('dealer')->get();

        return json_encode($yards);
    }

    public function dealerYards($dealer_id = null)
    {
        $query = $this->yard->query();
        if (!is_null($dealer_id)) {
            $query->where('dealer_id', $dealer_id);
        } else {
            if (auth()->user()->role === "dealer") {
                $query->where('dealer_id', auth()->user()->dealer_id);
            }
        }
        $yards = $query->with('dealer')->get();

        return json_encode($yards);
    }

    public function yardsCreate(Request $request)
    {
        $validated = $request->validate(['yard_id' => ['nullable', 'exists:yards,id', 'integer'], 'yard' => ['required', 'max:80'], 'address' => ['string', 'max:200', 'nullable'], 'email' => ['email', 'max:60', 'string'], 'phone' => ['string', 'max:18', 'nullable']]);
        $dealer_id = $request->dealer_id ?? auth()->user()->dealer_id;
        if (!is_null($request->yard_id)) {
            $yard = $this->yard->find($request->yard_id);
            $yard->update(['dealer_id' => $dealer_id] + $validated);
        } else {
            $this->yard->create(['user_id' => auth()->id(), 'dealer_id' => $dealer_id] + $validated);
        }
        return json_encode(['status' => 'success', 'message' => 'Yard added successfully']);
    }

    public function uploadImages(Request $request)
    {
        $imageString = explode(',', $request->image);
        if (isset($request->vehicle_id) && $request->vehicle_id !== null) {
            $vehicle = $this->vehicle->find($request->vehicle_id);
            $str_id = $vehicle->vehicle_no;
        } else {
            $str_id = $request->str_id;
        }

        if (isset($request->cover_image) && $request->cover_image == true) {
            if (session()->has($str_id . 'cover')) {
                session()->forget($str_id . 'cover');
            }
            session()->put($str_id . 'cover', $imageString[1]);
        } else {
            if (session()->has([$str_id . 'images'])) {
                session()->push($str_id . 'images', $imageString[1]);
            } else {
                session()->put($str_id . 'images', [$imageString[1]]);
            }
        }

        return 'success';
    }

    public function store(VehicleRequest $request)
    {
        $validated = $request->validated();
        if (auth()->user()->role === "admin") {
            $dealer = $this->dealer->find($validated['dealer_id']);
        } else {
            if (!is_null(auth()->user()->dealer_id)) {
                $dealer = $this->dealer->find(auth()->user()->dealer_id);
            } else {
                $dealer = null;
            }
        }
        $name = (!is_null($dealer)) ? $dealer->name : auth()->user()->name;

        if (isset($request->vehicle_id) && $request->vehicle_id !== null) {
            $vehicle = $this->vehicle->find($request->vehicle_id);
            $strkey = $vehicle->vehicle_no;
            $images = json_decode($vehicle->images, true);
            $images =  is_array($images) ? $images : [];
        } else {
            $strkey = $request->str_id;
            $images = [];
        }


        if (session()->has($strkey . 'images')) {
            foreach (session($strkey . 'images') as $key => $value) {
                $image = base64_decode($value);
                $fileName = 'img' . auth()->id() . $key . strtotime(now()) . '.jpg'; // or any other desired file name
                $img = Image::make($image);
                $img->text(' ' . $name . ' via AA Kenya', 150, 120, function ($font) {
                    $font->file(public_path('fonts//font.ttf'));
                    $font->size(18);
                    $font->color('#CECECE');
                    $font->align('center');
                    $font->valign('center');
                    $font->angle(0);
                });
                $img->save(public_path('vehicleimages/' . $fileName));
                array_push($images, $fileName);
            }
        }
        $validated['tags'] = (isset($validated['tags'])) ? json_encode($validated['tags']) : null;
        DB::beginTransaction();
        if (isset($request->vehicle_id) && $request->vehicle_id !== null) {
            if ($vehicle->price !== $validated["price"]) {
                VehiclePrice::create(['vehicle_id' => $vehicle->id, 'price' => $validated['price']]);
            }
            $vehicle->update(['updated_by' => auth()->id()] + $validated);

            if (isset($validated["features"]) && count($validated["features"]) > 0) {
                $this->vehicle->updatefeatures($vehicle->id, $validated["features"]);
            }
            $message = "Vehicle updated successfully";
        } else {
            $vehicle = Vehicle::create(['user_id' => auth()->id(), 'vehicle_no' => strtoupper(Str::random(3)) . strtotime(now()), 'views' => 0] + $validated);
            if (isset($validated["features"]) && count($validated["features"]) > 0) {
                $this->vehicle->addfeatures($vehicle->id, $validated["features"]);
            }
            VehiclePrice::create(['vehicle_id' => $vehicle->id, 'price' => $validated['price']]);
            $message = "Vehicle added successfully";
        }
        VehicleImage::new($vehicle->id, $images);
        DB::commit();
        session()->forget($strkey . "images");
        session()->forget($strkey . 'cover');
        if (session()->has('advertinfo')) {
            session()->forget('advertinfo');
        }
        return json_encode(['status' => 'success', 'message' => $message]);
    }

    public function addImage(Request $request)
    {
        $imageString = explode(',', $request->image);
        if (isset($request->cover_image) && $request->cover_image == true) {
            if (session()->has($request->vehicle_id . "_vehicle_cover")) {
                session()->forget($request->vehicle_id . "_vehicle_cover");
            }
            session()->put($request->vehicle_id . "_vehicle_cover", $imageString[1]);
        } else {
            if (session()->has($request->vehicle_id . "_vehicle_images")) {
                session()->push($request->vehicle_id . "_vehicle_images", $imageString[1]);
            } else {
                session()->put($request->vehicle_id . "_vehicle_images", [$imageString[1]]);
            }
        }
        return 'success';
    }

    public function imageDelete(Request $request)
    {
        $vehicle = $this->vehicle->find($request->vehicle_id);
        if (isset($request->photo_delete) && $request->photo_delete) {
            $image = $request->image;
            $images = array_filter(json_decode($vehicle->images, true), function ($value) use ($image) {
                return $value !== $image;
            });
            if (File::exists(public_path('vehicleimages/' . $request->image))) {
                Storage::delete('vehicleimages/' . $request->image);
            }
            $vehicle->images = json_encode($images);
            $vehicle->update();
        }
        return json_encode(['status' => 'success', 'message' => 'Image deleted successfully']);
    }

    public function destroy(string $id)
    {
        $this->vehicle->find($id)->destroy();
        return json_encode(['status' => "success", 'message' => "Vehicle deleted successfully"]);
    }

    public function filterVehicles(Request $request)
    {
        $query = $this->vehicle->initialize();
        if (isset($request->dealer_id) && !is_null($request->dealer_id)) {
            $query->where('dealer_id', $request->dealer_id);
        }
        if (isset($request->yard_id) && !is_null($request->yard_id)) {
            $query->where('yard_id', $request->yard_id);
        }
        if (isset($request->make_id) && !is_null($request->make_id)) {
            $query->where('make_id', $request->make_id);
        }
        if (isset($request->model_id) && !is_null($request->model_id)) {
            $query->where('vehicle_model_id', $request->model_id);
        }
        $vehicles = $query->latest()->with(['dealer:id,name', 'user:id,name', 'make:id,make', 'model:id,model', 'prices'])->get();
        return json_encode($vehicles);
    }
}
