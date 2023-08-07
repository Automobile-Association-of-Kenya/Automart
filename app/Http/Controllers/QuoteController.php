<?php

namespace App\Http\Controllers;

use App\Mail\QuoteRequest;
use App\Models\Notification;
use App\Models\Quote;
use App\Models\Vehicle;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class QuoteController extends Controller
{
    public function __construct()
    {
        $this->quote = new Quote();
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
            'user_id' => ['nullable', 'exists:users,id'],
            'vehicle_id' => ['nullable', 'exists:vehicles,id'],
            'name' => ['string', 'nullable', 'max:60'],
            'phone' => ['string', 'nullable', 'max:16'],
            'email' => ['string', 'nullable', 'max:60'],
            'subject' => ['string', 'nullable', 'max:100'],
            'message' => ['string', 'nullable', 'max:450']
        ]);
        $validated['user_id'] = auth()->id() ?? null;

        $vehicle = $this->vehicle->find($validated["vehicle_id"]);
        $email = $vehicle->dealer?->email ?? $vehicle->user?->email;
        $name = $vehicle->dealer?->name ?? $vehicle->user?->name;
        $message = "Quote Request From ".$request->name.", ".$request->phone.", ".$request->email."<br>".$request->message;
        $subject = "New Quote Request on Vehicle Ref " . $vehicle->vehicle_no;
        Notification::create(['source' => 'Quotation', 'subject' => $subject, 'message' => $message]);
        $this->quote->create($validated);
        Mail::to($email, $name)->send(new QuoteRequest($vehicle,$subject,$message,$validated["email"],$validated["name"]));
        return json_encode(['status'=>'success', 'message'=>'Quote request captured successfully']);
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
