<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Caronsells;
use App\Models\Payment;
use App\Models\CarMake;
use App\Models\CarModel;
use Intervention\Image\Facades\Image;

class SellController extends Controller
{

    public function index()
    {
        $make = CarMake::all();

        return view('sell', compact('make'));
    }

    public function store(Request $request)
    {
        return $request;
        // return $request->cover_photo;
        // $this->validate($request, [
        //     'title' => 'required',
        //     'country'  => 'required',
        //     'county' => 'required',
        //     'make' => 'required',
        //     'model' => 'required',
        //     'year' => 'required',
        //     'price' => 'required',
        //     'miles' => 'required',
        //     'enginecc' => 'required',
        //     'exterior' => 'required',
        //     'interior' => 'required',
        //     'fuel_type' => 'required',
        //     // 'features' => 'required',
        //     'transmission' => 'required',
        //     'usage' => 'required',
        //     'description' => 'required',
        //     'cover_photo' => 'max:2048',
        //     'images' => 'required|max:10|min:1',
        //     'images.*' => 'max:2048',
        //     'firstname' => 'required',
        //     'lastname' => 'required',
        //     'email' => 'required',
        //     'phone' => 'required'
        // ]);


        $cover_photo = '';
        if ($request->hasFile('cover_photo')) {
            $image = $request->cover_photo;
            $name = 'cv'.auth()->id().strtotime(now()).'.jpg';
            $img = Image::make($image);
            // $img->resize(600, 450, function ($constraint) {
            //     $constraint->aspectRatio();
            //     $constraint->upsize();
            // });
            $img->save(public_path('images/' . $name));
            $cover_photo += $name;
        }

        if (count($request->images) > 10) {
            return redirect()->back()->with('errorMsg', 'Images must not be more than 10');
        }

        $imagenames = [];

        if ($request->hasfile('images')) {
            // return "hre";
            foreach ($request->images as $key => $value) {
                $fileName = 'img' .auth()->id(). strtotime(now()) . $key . '.jpg'; // or any other desired file name
                $img = Image::make($value);
                // $img->resize(600, 450, function ($constraint) {
                //     $constraint->aspectRatio();
                //     $constraint->upsize();
                // });
                $img->save(public_path('images/' . $fileName));
                $imagenames[] = $fileName;
            }
        }

        $prefix = "GWAAK";
        $carID = $prefix . rand();

        $carOnSell = new Caronsells;
        $carOnSell->user_id = auth()->id();
        $carOnSell->title = $request->title;
        $carOnSell->country = $request->country;
        $carOnSell->county = $request->county;
        $carOnSell->make = $request->make;
        $carOnSell->model = $request->model;
        $carOnSell->year = $request->year;
        $carOnSell->price = $request->price;
        $carOnSell->miles = $request->miles;
        $carOnSell->enginecc = $request->enginecc;
        $carOnSell->usage = $request->usage;
        $carOnSell->exterior = $request->exterior;
        $carOnSell->interior = $request->interior;
        $carOnSell->fuel_type = $request->fuel_type;
        $carOnSell['features'] = json_encode($request->input('features'));
        $carOnSell->transmission = $request->transmission;
        $carOnSell->description = $request->description;
        $carOnSell->images = json_encode($imagenames);
        $carOnSell->carId = $carID;
        $carOnSell->cover_photo = $cover_photo;
        $carOnSell->firstname = $request->firstname;
        $carOnSell->lastname = $request->lastname;
        $carOnSell->email = $request->email;
        $carOnSell->phone = $request->phone;
        $carOnSell->cover_photo = $cover_photo;
        $carOnSell->save();
        return json_encode(['status'=>'success', 'message'=> 'Vehicle added successfully']);
    }

    public function formatPhone($phone)
    {
        $country_code = "+254";
        $phone = preg_replace("/[^0-9]/", "", $phone);
        if (substr($phone, 0, 1) === '0') {
            $phone = substr($phone, 1);
        }
        $phone = $country_code . $phone;
        return $phone;
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'title' => 'required',
            'country'  => 'required',
            'county' => 'required',
            'make' => 'required',
            'model' => 'required',
            'year' => 'required',
            'price' => 'required',
            'miles' => 'required',
            'enginecc' => 'required',
            'exterior' => 'required',
            'interior' => 'required',
            'fuel_type' => 'required',
            'usage' => 'required',
            'transmission' => 'required',

            'description' => 'required',
            'cover_photo' => 'nullable|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'images' => 'nullable|max:10|min:1',
            'images.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'firstname' => 'required',
            'lastname' => 'required',
            'email' => 'required',
            'phone' => 'required'
        ]);
        if ($request->images != null) {
            if (count($request->images) > 10) {
                return redirect()->back()->with('errorMsg', 'Images must not be more than 10');
            }
        }


        $carOnSell = Caronsells::find($id);
        $images = json_decode($carOnSell, true);

        $name = $carOnSell->cover_photo;
        $data = json_decode($carOnSell->images);
        if ($request->has('cover_photo')) {
            $image = $request->cover_photo;
            $name = time() . $image->getClientOriginalName();
            $img = Image::make($image);
            $img->resize(600, 450, function ($constraint) {
                $constraint->aspectRatio();
                $constraint->upsize();
            });
            $img->save(public_path('images/' . $name));
        }

        if ($request->hasfile('images')) {
            foreach ($request->file('images') as $image) {
                $name = time() . $image->getClientOriginalName();
                $img = Image::make($image);
                $img->resize(600, 450, function ($constraint) {
                    $constraint->aspectRatio();
                    $constraint->upsize();
                });
                $img->save(public_path('images/' . $name));
                array_push($images, $name);

            }
        }
        $prefix = "GWAAK";
        $carID = $prefix . rand();


        $carOnSell->title = $request->title;
        $carOnSell->country = $request->country;
        $carOnSell->county = $request->county;
        $carOnSell->make = $request->make;
        $carOnSell->model = $request->model;
        $carOnSell->year = $request->year;
        $carOnSell->price = $request->price;
        $carOnSell->miles = $request->miles;
        $carOnSell->usage = $request->usage;
        $carOnSell->exterior = $request->exterior;
        $carOnSell->interior = $request->interior;
        $carOnSell->fuel_type = $request->fuel_type;

        $carOnSell['features'] = json_encode($request->input('features'));
        $carOnSell->transmission = $request->transmission;
        $carOnSell->enginecc = $request->enginecc;
        $carOnSell->description = $request->description;
        $carOnSell->images = json_encode($images);
        $carOnSell->firstname = $request->firstname;
        $carOnSell->lastname = $request->lastname;
        $carOnSell->email = $request->email;
        $carOnSell->phone = $request->phone;
        $carOnSell->carId = $carID;
        $carOnSell->cover_photo = $name;
        $carOnSell->save();
        return redirect('/dealer/mycars')->with('success', 'Vehicle updated successfully');
    }
    public function pay()
    {
        $packs =  $packs = Payment::all();
        return view('payments', compact('packs'));
    }
    public function getmodel($id)
    {
        $model = CarModel::where('car_make_id', $id)->pluck("car_model_name", "id");
        return json_encode($model);
    }
}
