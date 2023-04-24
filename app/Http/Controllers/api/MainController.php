<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\CarMake;
use App\Models\CarModel;
use App\Models\Caronsells;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function __construct()
    {
        $this->make = new CarMake();
        $this->model = new CarModel();
        $this->vehicle = new Caronsells();
    }

    public function search(Request $request)
    {
        $make = $request->make;
        $model = $request->model;
        $year = $request->year;
        $type = $request->type;
        $price = $request->price;
        $query = Caronsells::query();
        if ($make !== "" && !is_null($make)) {
            $query->where('make', $make);
        }
        if ($model !== "" && !is_null($model)) {
            $query->where('model', $model);
        }
        if ($year !== "" && !is_null($year)) {
            $query->where('year', $year);
        }
        if ($type !== "" && !is_null($type)) {
            $query->where('vehicle_type', $type);
        }
        if ($price !== "" && !is_null($price)) {
            $query->where('price', '>=', $price);
        }
        $vehicles = $query->latest()->with(['make' => function ($sql) {
            return $sql->select('car_make_id', 'car_make_name');
        }, 'model' => function ($sqs) {
            return $sqs->select('car_model_id', 'car_model_name');
        }])->get();

        return json_encode($vehicles);
    }


    public function makes()
    {
        $makes = $this->make->get();
        return json_encode($makes);
    }

    public function models()
    {
        $models = $this->model->with('make')->get();
        return json_encode($models);
    }

    public function vehicles()
    {
        $vehicles = $this->vehicle->get();
        return json_encode($vehicles);
    }

    public function vehiclesByUserEmail($email)
    {
        $vehicles = $this->vehicle->where('email',$email)->get();
        return json_encode($vehicles);
    }
}
