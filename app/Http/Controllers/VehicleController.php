<?php

namespace App\Http\Controllers;

use App\Http\Requests\VehicleRequest;
use App\Models\Dealer;
use App\Models\Make;
use App\Models\Vehicle;
use App\Models\VehicleModel;
use Illuminate\Http\Request;

class VehicleController extends Controller
{
    public function __construct()
    {
        $this->vehicle = new Vehicle();
        $this->make = new Make();
        $this->model = new VehicleModel();
        $this->dealer = new Dealer();
    }

    public function index()
    {
        return view('vehicles.index');
    }

    public function makes()
    {
        $makes = $this->make->select('id', 'name')->get();
        return json_encode($makes);
    }

    public function models($make_id)
    {
        $models = $this->model->where('make_id', $make_id)->select('id', 'name')->get();
        return json_encode($models);
    }

    public function dealers()
    {
        $dealers = $this->dealer->get();
        return json_encode($dealers);
    }

    public function features()
    {
        $features = $this->feature->select('id','name')->get();
        return json_encode($features);
    }


    public function store(VehicleRequest $request)
    {
        
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
