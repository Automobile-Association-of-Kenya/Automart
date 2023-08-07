<?php

namespace App\Http\Controllers;

use App\Mail\QuoteRequest;
use App\Models\Finance;
use App\Models\Notification;
use App\Models\Tradein;
use App\Models\Vehicle;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class FinanceController extends Controller
{
    public function __construct()
    {
        $this->finance = new Finance();
        $this->tradein = new Tradein();
        $this->vehicle = new Vehicle();
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'vehicle_id' => ['nullable', 'exists:vehicles,id'],
            'name' => ['nullable', 'string', 'max:60'],
            'email' => ['nullable', 'string', 'max:60'],
            'phone' => ['nullable', 'string', 'max:16'],
            'partner_id' => ['nullable', 'exists:partners,id'],
            'subject' => ['nullable', 'string', 'max:60'],
            'amount' => ['nullable', 'string', 'max:12']
        ]);

        $validated['user_id'] = auth()->id() ?? null;
        $finance = $this->finance->create($validated);
        return json_encode(['status'=>'success','message'=>'Financial support application received successfully']);
    }


    public function tradeInStore(Request $request)
    {
        $validated = $request->validate([
            'vehicle_id' => ['required', 'exists:vehicles,id'],
            'name' => ['nullable', 'max:100'],
            'email' => ['nullable', 'max:60'],
            'phone' => ['nullable','max:16'],
            'make_id' => ['nullable','exists:makes,id'],
            'vehicle_model_id' => ['required', 'exists:vehicle_models,id'],
            'year' => ['nullable', 'max:5'],
            'reg_no' => ['required', 'max:10'],
        ]);
        $validated["user_id"] = auth()->id() ?? null;
        $tradein = $this->tradein->create($validated);
        $vehicle = $this->vehicle->find($validated["vehicle_id"]);
        $email = $vehicle->dealer?->email ?? $vehicle->user?->email;
        $name = $vehicle->dealer?->name ?? $vehicle->user?->name;
        $message = "Trade In Request From " . $request->name . ", " . $request->phone . ", " . $request->email . " for ".$tradein->year." ".$tradein->vehicle->make->make.' '.$tradein->Vehicle->model->model.' '.$tradein->reg_no;
        $subject = "New Trade in Request on Vehicle Ref " . $vehicle->vehicle_no .' '.$vehicle->year.' '.$vehicle->make->make.' '.$vehicle->model->model;
        Notification::create(['source' => 'Trade In', 'subject' => $subject, 'message' => $message]);
        Mail::to("magaben33@gmail.com", $name)->send(new QuoteRequest($vehicle, $subject, $message,$validated["email"],$validated["name"]));
        return json_encode(['status'=>'success', 'message'=>'Trade in request submitted successfully']);
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
