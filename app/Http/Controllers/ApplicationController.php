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
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
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

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
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
        $validated["features"] = json_encode($validated["features"]);
        Caronsells::create(['user_id' => auth()->id(), 'carId' => $strkey, 'cover_photo' => $images[0], 'images' => json_encode($images), 'views' => 0] + $validated);
        session()->forget("$strkey");

        return json_encode(['status' => 'success', 'message' => "Vehicle added successfully"]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'title' => ['required', 'max:255'],
            'country' => ['required', 'max:255'],
            'county' => ['required', 'max:255'],
            'make' => ['required', 'max:255'],
            'model' => ['required', 'max:255'],
            'year' => ['required', 'max:255'],
            'price' => ['required', 'max:255'],
            'miles' => ['required', 'max:255'],
            'enginecc' => ['required', 'max:255'],
            'exterior' => ['required', 'max:255'],
            'interior' => ['required', 'max:255'],
            'fuel_type' => ['required', 'max:255'],
            'features' => ['required'],
            'transmission' => ['required', 'max:255'],
            'vehicle_type' => ['nullable', 'max:255'],
            'description' => ['required',],
            'firstname' => ['required'],
            'lastname' => ['required'],
            'email' => ['required'],
            'phone' => ['required'],
            'usage' => ['required', 'max:255'],
            'trans_id' => ['nullable', 'max:255'],
            'package' => ['nullable', 'max:255'],
            'deal_slideshow' => ['nullable', 'max:255'],
        ]);
        $vehicle = Caronsells::findOrFail($id);
        $images = $vehicle->images;
        if (session()->has("$request->vehicle_id._vehicle_images")) {
            foreach (session("$request->vehicle_id._vehicle_images") as $key => $value) {
                $image = base64_decode($value);
                $fileName = 'img' . auth()->id() . $key . strtotime(now()) . '.jpg'; // or any other desired file name
                $img = Image::make($image);
                $img->save(public_path('images/' . $fileName));
                array_push($images, $fileName);
            }
        }
        $vehicle->update(['images'=>json_encode($images)]+$validated);
        return json_encode(['status' => 'success', 'message' => "Vehicle updated successfully"]);        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
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
        if (session()->has(["$request->vehicle_id._vehicle_images"])) {
            session()->push("$request->vehicle_id._vehicle_images", $imageString[1]);
        } else {
            session()->put("$request->vehicle_id._vehicle_images", [$imageString[1]]);
        }

        return 'success';
    }
}
