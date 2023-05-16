<?php

namespace App\Http\Controllers;

use App\Http\Requests\VehicleRequest;
use App\Models\Dealer;
use App\Models\Feature;
use App\Models\Make;
use App\Models\Type;
use App\Models\Vehicle;
use App\Models\VehicleModel;
use App\Models\VehiclePrice;
use App\Models\Yard;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;

class VehicleController extends Controller
{
    public function __construct()
    {
        $this->vehicle = new Vehicle();
        $this->make = new Make();
        $this->model = new VehicleModel();
        $this->dealer = new Dealer();
        $this->type = new Type();
        $this->feature = new Feature();
        $this->auth = auth()->user();
        $this->yard = new Yard();
    }

    public function index(): View
    {
        $str = strtotime(date('Y-m-d H:i:s')) . auth()->id();
        return view('vehicles.index', compact('str'));
    }

    public function makes($id = null)
    {
        $query = $this->make->query();
        if (!is_null($id)) {
            $query->where('id', $id);
        }
        $makes = $query->select('id', 'make')->get();

        return json_encode($makes);
    }

    public function makeCreate(Request $request)
    {
        $validated = $request->validate(['make' => ['required', 'max:80']]);
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
        $models = $query->with('make')->latest('id')->get();

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
        $vehicles = $this->vehicle
            ->with(['dealer' => function ($dealer) {
                return $dealer->select('id', 'name');
            }, 'make' => function ($make) {
                return $make->select('id', 'make');
            }, 'model' => function ($model) {
                return $model->select('id', 'model');
            }, 'prices' => function ($query) {
                return $query->latest()->limit(2)->select('price');
            }])->latest()->get();
        // if ($this->auth->role === "dealer") {
        //     $vehicles = $this->vehicle->where('dealer_id', $this->auth->dealer_id)
        //         ->with(['dealer', 'make', 'model', 'prices' => function ($query) {
        //             return $query->latest()->limit(1);
        //         }])->latest()->get();
        // } else {
        //     $vehicles = $this->vehicle
        //         ->with(['dealer', 'make', 'model', 'prices' => function ($query) {
        //             return $query->latest()->limit(1);
        //         }])->latest()->get();
        // }

        return json_encode($vehicles);
    }

    public function show($id)
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


    public function yards($id = null)
    {
        $query = $this->yard->query();
        if (!is_null($id)) {
            $query->where('id', $id);
        }
        $yards = $query->with('dealer')->get();
        return json_encode($yards);
    }

    public function dealerYards($dealer_id)
    {
        $yards = $this->yard->where('dealer_id', $dealer_id)->get();
        return json_encode($yards);
    }

    public function yardsCreate(Request $request)
    {
        $validated = $request->validate(['yard_id' => ['nullable', 'exists:yards,id', 'integer'], 'yard' => ['required', 'max:80'], 'address' => ['string', 'max:200', 'nullable'], 'email' => ['email', 'max:60', 'string'], 'phone' => ['string', 'max:18', 'nullable']]);
        $dealer_id = $request->dealer_id ?? $this->user->dealer_id;
        if (!is_null($request->yard_id)) {
            $yard = $this->yard->find($request->yard_id);
            $yard->update(['dealer_id' => $dealer_id] + $validated);
        } else {
            $this->yard->create(['dealer_id' => $dealer_id] + $validated);
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
        $dealer = (isset($validated['dealer_id'])) ? $this->dealer->find($validated["dealer_id"]) : $this->auth->dealer();
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
                $img->text(' ' . $dealer->name . ' via AA Kenya', 150, 120, function ($font) {
                    $font->file(public_path('fonts/font.ttf'));
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
        if (session()->has($strkey . 'cover')) {
            $jsone = session($strkey . 'cover');
            $image = base64_decode($jsone);
            $coverImage = 'img' . auth()->id() . 'cover' . strtotime(now()) . '.jpg'; // or any other desired file name
            $img = Image::make($image);
            $img->text(' ' . $dealer->name . ' via AA Kenya', 150, 120, function ($font) {
                $font->file(public_path('fonts/font.ttf'));
                $font->size(18);
                $font->color('#CECECE');
                $font->align('center');
                $font->valign('center');
                $font->angle(0);
            });
            $img->save(public_path('vehicleimages/' . $coverImage));
        }

        $validated['tags'] = (isset($validated['tags'])) ? json_encode($validated['tags']) : null;

        DB::beginTransaction();
        if (isset($request->vehicle_id) && $request->vehicle_id !== null) {
            $vehicle->update(['vehicle_no' => $strkey, 'cover_photo' => $coverImage ?? null, 'images' => json_encode($images)] + $validated);
            $this->vehicle->updatefeatures($vehicle->id, $validated["features"]);
            VehiclePrice::create(['vehicle_id' => $vehicle->id, 'price' => $validated['price']]);
        }else {
            $vehicle = Vehicle::create(['vehicle_no' => $strkey, 'cover_photo' => $coverImage ?? null, 'images' => json_encode($images), 'views' => 0] + $validated);
            $this->vehicle->addfeatures($vehicle->id, $validated["features"]);
            VehiclePrice::create(['vehicle_id' => $vehicle->id, 'price' => $validated['price']]);
        }
        DB::commit();

        session()->forget($strkey . "images");
        session()->forget($strkey . 'cover');

        return json_encode(['status' => 'success', 'message' => "Vehicle added successfully"]);
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
        if (isset($request->cover_photo_delete) && $request->cover_photo_delete == true) {
            if (File::exists('vehicleimages/' . $vehicle->cover_photo)) {
                File::delete('vehicleimages/' . $vehicle->cover_photo);
            }
            $vehicle->cover_photo = null;
            $vehicle->update();
        } elseif (isset($request->photo_delete) && $request->photo_delete) {
            $image = $request->image;
            $images = array_filter(json_decode($vehicle->images, true), function ($value) use ($image) {
                return $value !== $image;
            });
            if (File::exists('vehicleimages/' . $vehicle->image)) {
                File::delete('vehicleimages/' . $vehicle->image);
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
}
