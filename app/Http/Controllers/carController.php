<?php

namespace App\Http\Controllers;

use App\Models\CarMake;
use App\Models\Caronsells;
use Illuminate\Http\Request;

class carController extends Controller
{
    public function index(){
        $vehicles = Caronsells::orderBy('created_at', 'desc')->paginate(9);
        $makes = CarMake::all();
        return view('all', compact('vehicles','makes'));
    }

    public function show($id){
        $vehicle = Caronsells::find($id);
       
        if ($vehicle) {
            # code...
            $count = $vehicle->views;
            $newcount = $count +=1;
            $vehicle->views = $newcount;
            $vehicle->update();
        }
       
        // if ($count <= 0) {
        //     # code...
        //     $count = 'zero views';
        // }
        
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

}
    
