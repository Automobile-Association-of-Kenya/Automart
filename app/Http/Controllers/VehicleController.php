<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\CarMake;
use App\Models\CarModel;
use App\Models\car_model;
use App\Models\Caronsells;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Intervention\Image\Facades\Image;
use App\Http\Resources\CarMakeResource;
use App\Http\Resources\CarModelResource;
use App\Http\Resources\CaronsellResource;
use Illuminate\Support\Facades\Validator;

class VehicleController extends Controller
{
    public function login(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'email' => 'required|email',
            'password' => 'required'
        ]);
        if ($validator->fails()) {
            return response()->json([
                'message' => 'Validation failed',
                'details' => $validator->errors()
            ]);
        }
        try {
            $user = User::where('email', $request->email)->first();
            if (! $user || ! Hash::check($request->password, $user->password)) {
                return response()->json([
                    'message' => 'The provided credentials are incorrect.',
                ]);
            }
            $token = Str::random(16);
            $generated_token= $user->createToken($token)->plainTextToken;
            return response()->json([
                'message' => 'Login successful',
                'details' => $user,
                'token' => $generated_token
            ]);
        } catch (\Throwable $th) {
            //throw $th;
        }
    }

    function list()
    {
        $cars = Caronsells::latest()->get();

        return CaronsellResource::collection($cars);
    }
    function add(Request $req)
    {
        $validator = Validator::make($req->all(),[
            'title' => 'required|string',
            'country' => 'required|string',
            'county' => 'required|string',
            'make' => 'required|string',
            'model' => 'required|string',
            'year' => 'required|integer',
            'price' => 'required|numeric',
            'miles' => 'required|numeric',
            'vin' => 'required|string',
            'exterior' => 'required|string',
            'interior' => 'required|string',
            'fuel_type' => 'required|string',
            'features' => 'required',
            'transmission' => 'required|string',
            'vehicle_type' => 'required|string',
            'description' => 'required|string',
            'images' => 'required|array',
            'firstname' => 'required|string',
            'lastname' => 'required|string',
            'email' => 'required|string',
        ]);
        if ($validator->fails()) {
            return response()->json([
                'message' => 'Validation failed',
                'details' => $validator->errors()
            ]);
        }
        if ($req->has('images')) {
            foreach ($req->images as $image) {
                $name = $image->getClientOriginalName();
                $image->move(public_path() . '/images/', $name);
                $data[] = $name;

                //add watermark
                $img = Image::make(public_path('images/'.$name));
                $img->text(' '.$req->firstname.' '.$req->lastname, 150, 120, function($font) {  
                    $font->file(public_path('assets/fonts/font.ttf'));  
                    $font->size(30);  
                    $font->color('#CECECE');  
                    $font->align('center');  
                    $font->valign('center');  
                    $font->angle(0);  
                });
                $img->save(public_path('images/'.$name));
            }
        }
        $prefix = "GWAAK";
        $carID = $prefix . rand();

        $caronsales= new Caronsells;
        $caronsales->title=$req->title;
        $caronsales->country=$req->country;
        $caronsales->county=$req->county;
        $caronsales->make=$req->make;
        $caronsales->model=$req->model;
        $caronsales->year=$req->year;
        $caronsales->price=$req->price;
        $caronsales->miles=$req->miles;
        $caronsales->vin=$req->vin;
        $caronsales->exterior=$req->exterior;
        $caronsales->interior=$req->interior;
        $caronsales->fuel_type=$req->fuel_type;
        $caronsales['features']=json_encode($req->features);
        $caronsales->transmission=$req->transmission;
        $caronsales->vehicle_type=$req->vehicle_type;
        $caronsales->description=$req->description;
        $caronsales->images=json_encode($data);
        $caronsales->firstname=$req->firstname;
        $caronsales->lastname=$req->lastname;
        $caronsales->email=$req->email;
        $caronsales->phone=$req->phone;
        $caronsales->carId=$carID;
        $caronsales->trans_id=$req->trans_id;
        $caronsales->package=$req->package;
        $caronsales->deal_slideshow=$req->deal_slideshow;
        $caronsales->created_at=$req->created_at;
        $caronsales->updated_at=$req->updated_at;


        $result=$caronsales->save();
        if($result)
        {
            return response()->json([
                'message' => 'Data saved successfully'
            ]);
        }
        else
        {
            return response()->json([
                'message' => 'Could not save data'
            ]);
        }
    }
    function search($make)
    {
        $cars = Caronsells::where('make',$make)->get();

        return CaronsellResource::collection($cars);
    }
    public function fetchModels(Request $request)
    {
       $models = CarModel::all()->paginate(10);
       return CarModelResource::collection($models);
    }
    public function fetchMakes(Request $request)
    {
       $makes = CarMake::all();
       return CarMakeResource::collection($makes);
    }
    public function getModels(Request $request)
    {
        $models = CarModel::where('car_make_id',$request->car_make_id)->orderBy('car_model_name','ASC')->get();
        return CarModelResource::collection($models);
    }
}
