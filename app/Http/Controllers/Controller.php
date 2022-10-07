<?php

namespace App\Http\Controllers;

use App\Models\CarMake;
use App\Models\Caronsells;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;


class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function index(){
        $vehicles = Caronsells::orderBy('created_at', 'desc')->paginate(6);
        $makes = CarMake::all();
        return view('index', compact('vehicles','makes'));
    }
}
