<?php

namespace App\Http\Controllers;

use App\Http\Requests\VehicleRequest;
use App\Models\Dealer;
use App\Models\Feature;
use App\Models\Make;
use App\Models\Type;
use App\Models\Vehicle;
use App\Models\VehicleModel;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class VehicleController extends Controller
{
    public function __construct()
    {
        $this->vehicle = new Vehicle();
        $this->make = new Make();
        $this->model = new VehicleModel();
        $this->dealer = new Dealer();
        $this->type = new Type();
        $this->feature = new Feature();
        $this->auth = auth()->user();
    }

    public function index(): View
    {
        return view('vehicles.index');
    }

    public function makes()
    {
        $makes = $this->make->select('id', 'make')->get();
        return json_encode($makes);
    }

    public function makeCreate(Request $request)
    {
        $validated = $request->validate(['make' => ['required', 'max:80']]);
        if (!is_null($request->make_id)) {
            $make = $this->make->find($request->make_id);
            $make->update($validated);
            return json_encode(['status' => 'success', 'message' => 'Make updated successfully']);
        } else {
            $this->make->create($validated);
            return json_encode(['status' => 'success', 'message' => 'Make added successfully']);
        }
    }

    public function models($make_id = null)
    {
        $query = VehicleModel::query();
        if ($make_id !== "null" && $make_id !== null) {
            $query->where('make_id', $make_id);
        }
        $models = $query->with('make')->latest('id')->get();

        return json_encode($models);
    }

    public function modelCreate(Request $request)
    {
        $validated = $request->validate(['make_id' => ['required', 'exists:makes,id'], 'model' => ['required', 'max:60']]);
        if (!is_null($request->model_id)) {
            $model = $this->model->find($request->model_id);
            $model->update($validated);
            return json_encode(['status' => 'success', 'message' => 'Model updated successfully']);
        } else {
            $this->model->create($validated);
            return json_encode(['status' => 'success', 'message' => 'Model added successfully']);
        }
    }

    public function types()
    {
        $types = $this->type->select('id', 'name')->get();
        return json_encode($types);
    }

    public function dealers()
    {
        $dealers = $this->dealer->get();
        return json_encode($dealers);
    }

    public function features()
    {
        $features = $this->feature->select('id', 'feature')->get();
        return json_encode($features);
    }

    public function featureCreate(Request $request)
    {
        $validated = $request->validate(['feature' => ['required', 'max:80'], 'description' => ['nullable', 'max:255']]);
        if (!is_null($request->feature_id)) {
            $feature = $this->feature->find($request->feature_id);
            $feature->update($validated);
            return json_encode(['status' => 'success', 'message' => 'Feature updated successfully']);
        } else {
            $this->feature->create($validated);
            return json_encode(['status' => 'success', 'message' => 'Feature added successfully']);
        }
    }

    public function store(VehicleRequest $request)
    {
        $validated = $request->validated();

        Vehicle::create($validated);
    }

    public function list()
    {
        $vehicles = $this->vehicle->with(['make', 'model'])->latest()->get();
        return json_encode($vehicles);
    }

    public function listVehicles()
    {
        $vehicles = $this->vehicle
            ->with(['dealer', 'make', 'model', 'prices' => function ($query) {
                return $query->latest()->limit(1);
            }])->latest()->get();
        // if ($this->auth->role === "dealer") {
        //     $vehicles = $this->vehicle->where('dealer_id', $this->auth->dealer_id)
        //         ->with(['dealer', 'make', 'model', 'prices' => function ($query) {
        //             return $query->latest()->limit(1);
        //         }])->latest()->get();
        // } else {
        //     $vehicles = $this->vehicle
        //         ->with(['dealer', 'make', 'model', 'prices' => function ($query) {
        //             return $query->latest()->limit(1);
        //         }])->latest()->get();
        // }

        return json_encode($vehicles);
    }


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
