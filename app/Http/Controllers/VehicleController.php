<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Caronsells;

class VehicleController extends Controller
{
    //

    function list($id=null)
    {
        return $id?Caronsells::find($id):Caronsells::all();

    }
    function add(Request $req)
    {
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
        $caronsales->features=$req->features;
        $caronsales->transmission=$req->transmission;
        $caronsales->vehicle_type=$req->vehicle_type;
        $caronsales->description=$req->description;
        $caronsales->images=$req->images;
        $caronsales->firstname=$req->firstname;
        $caronsales->lastname=$req->lastname;
        $caronsales->email=$req->email;
        $caronsales->phone=$req->phone;
        $caronsales->carId=$req->carId;
        $caronsales->trans_id=$req->trans_id;
        $caronsales->package=$req->package;
        $caronsales->deal_slideshow=$req->deal_slideshow;
        $caronsales->created_at=$req->created_at;
        $caronsales->updated_at=$req->updated_at;


        $result=$caronsales->save();
        if($result)
        {
            return ["Result"=>"Data has been saved"];
        }
        else
        {
            return ["Result"=>"Data has  not been saved"];
        }
    }
    function search($make)
    {
        return Caronsells::where("make","like","%".$make."%")->get();
    }
}
