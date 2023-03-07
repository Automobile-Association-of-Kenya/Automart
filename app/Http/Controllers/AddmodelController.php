<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CarModel;

class AddmodelController extends Controller
{
    //
    function add(Request $req){

        $model=new CarModel;
        $model->car_model_name=$req->car_model_name;
        $model->car_make_id=$req->car_make_id;
       $result=$model->save();

       if($result)
       {
        return["Result"=>"Data has been saved"];
       }

        else{
            return["Result"=>"Operation Failed"];
        }
    }
}
