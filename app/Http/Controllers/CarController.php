<?php

namespace App\Http\Controllers;

use App\Models\CarMake;
use App\Models\Caronsells;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class CarController extends Controller
{
    protected $car;
    public function __construct()
    {
        $this->car = new Caronsells();
    }

    public function index(){
        $vehicles = Caronsells::orderBy('created_at', 'desc')->paginate(9);
        $makes = CarMake::all();
        return view('all', compact('vehicles','makes'));
    }

    public function show($id){
        $vehicle = Caronsells::find($id);
        
        return view('details', compact('vehicle'));
    }

    public function search(Request $request){
        $this->validate($request, [
            'make'  => 'required',
            'model' => 'required',
            'from_year' => 'nullable',
            'to_year' => 'nullable',
            'min_mileage' => 'nullable',
            'max_mileage' => 'nullable',
            'min_engine' => 'nullable',
            'max_engine' => 'nullable',
            'min_price' => 'nullable',
            'max_price' => 'nullable',
        ]);  
        $vehicles = Caronsells::where('make', $request->make)
        ->where('model', $request->model)
        ->paginate(9);

        return view('search', compact('vehicles'));
               
    }

    public function deleteImage(Request $request)
    {
        $car = $this->car->findOrFail($request->id);
        $images = json_decode($car->images);
        // $key = array_search($request->image, $images);
        $images1 = array_filter($images, function($value) use ($request){
            return $value !== $request->image;
        });
        // return json_encode(['images'=> $images1, 'img'=>$request->image]);
        if (File::exists('images/'.$request->image)) {
            File::delete('images/' . $request->image);
        }
        $car->images = json_encode($images1);
        $car->update();

        return json_encode(['status'=>'success', 'message'=>'Deleted successfully']);
    }

}
    
