<?php

namespace App\Http\Controllers;

use App\Models\Quote;
use Illuminate\Http\Request;

class QuoteController extends Controller
{
    public function __construct()
    {
        $this->quote = new Quote();
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
        $this->quote->create($validated);
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
