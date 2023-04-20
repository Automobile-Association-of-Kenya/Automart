<?php

namespace App\Http\Controllers;

use App\Http\Requests\VehicleRequest;
use App\Models\CarMake;
use App\Models\Caronsells;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;


class ApplicationController extends Controller
{

    public function welcome()
    {
        $vehicles = Caronsells::orderBy('id', 'desc')->paginate(6);
        $makes = CarMake::all();
        // $images = json_decode($vehicles[0]->images,true);
        // return $images[0];
        return view('index', compact('vehicles', 'makes'));
    }

    public function about()
    {
        return redirect()->back();
    }
    
    public function index()
    {
        //
    }

    
    public function create()
    {
        //
    }

    public function handleImages(Request $request)
    {
        $imageString = explode(',', $request->image);
        // $image = base64_decode($imageString[1]);
        // $fileName = 'img' . auth()->id() . strtotime(now()) . '.jpg'; // or any other desired file name
        // $img = Image::make($image);
        // $path = $img->store('temp', 'public');
        if (session()->has(["$request->str_id"])) {
            session()->push("$request->str_id", $imageString[1]);
        } else {
            session()->put("$request->str_id", [$imageString[1]]);
        }
        return 'success';
    }

    
    public function store(VehicleRequest $request)
    {
        $images = [];
        $strkey = $request->str_id;
        if (session()->has("$strkey")) {
            foreach (session("$strkey") as $key => $value) {
                $image = base64_decode($value);
                $fileName = 'img' . auth()->id() . $key . strtotime(now()) . '.jpg'; // or any other desired file name
                $img = Image::make($image);
                $img->save(public_path('images/' . $fileName));
                array_push($images, $fileName);
            }
        }

        $validated = $request->validated();
        $validated["features"] = json_encode(explode(',', $validated["features"]));
        Caronsells::create(['user_id' => auth()->id(), 'carId' => $strkey, 'cover_photo' => $images[0], 'images' => json_encode($images), 'views' => 0] + $validated);
        session()->forget("$strkey");

        return json_encode(['status' => 'success', 'message' => "Vehicle added successfully"]);
    }

    
    public function show($id)
    {
        //
    }

   
    public function edit($id)
    {
        //
    }

    public function updateVehicle(VehicleRequest $request, $id)
    {
        $validated = $request->validated();
        $vehicle = Caronsells::findOrFail($id);
        $images = json_decode($vehicle->images);
        if (session()->has($id . "_vehicle_images")) {
            foreach (session($id . "_vehicle_images") as $key => $value) {
                $image = base64_decode($value);
                $fileName = 'img' . auth()->id() . $key . strtotime(now()) . '.jpg'; // or any other desired file name
                $img = Image::make($image);
                $img->save(public_path('images/' . $fileName));
                array_push($images, $fileName);
            }
        }
        $validated["features"]= json_encode(explode(',', $validated["features"]));
        $vehicle->update(['images'=>json_encode($images)]+$validated);
        session()->forget($id . "_vehicle_images");
        return json_encode(['status' => 'success', 'message' => "Vehicle updated successfully"]);        
    }

    public function destroy($id)
    {
        //
    }

    public function updateImages(Request $request)
    {
        $imageString = explode(',', $request->image);
        // $image = base64_decode($imageString[1]);
        // $fileName = 'img' . auth()->id() . strtotime(now()) . '.jpg'; // or any other desired file name
        // $img = Image::make($image);
        // $path = $img->store('temp', 'public');

        if (session()->has($request->vehicle_id."_vehicle_images")) {
            session()->push($request->vehicle_id."_vehicle_images", $imageString[1]);
        } else {
            session()->put($request->vehicle_id."_vehicle_images", [$imageString[1]]);
        }
        return 'success';
    }
}
