<?php

namespace App\Http\Controllers;

use App\Http\Requests\DealerRequest;
use App\Jobs\SendEmailVerificationNotification;
use App\Models\Dealer;
use App\Models\User;
use App\Models\Vehicle;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class DealerController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except(['create','store']);
        $this->dealer = new Dealer();
        $this->user = new User();
        $this->vehicle = new Vehicle();
    }

    public function index()
    {
        return view('dealers.index');
    }

    public function create()
    {
        return view('dealers.create');
    }

    public function vehicles()
    {
        $vehicles = $this->vehicle
            ->where('dealer_id', auth()->user()->dealer_id)
            ->with(['type' => function ($type) {
                return $type->select('id', 'type');
            }, 'make' => function ($make) {
                return $make->select('id', 'make');
            }, 'model' => function ($model) {
                return $model->select('id', 'model');
            }, 'prices' => function ($query) {
                return $query->select('id', 'price');
            }, 'yard' => function ($yard) {
                return $yard->select('id', 'yard');
            }, 'features' => function ($fea) {
                return $fea->select('features.id', 'features.feature');
            }])->latest()->get();

        return view('dealers.vehicles', compact('vehicles'));
    }

    public function store(DealerRequest $request)
    {
        $validated = $request->validated();
        $dealer = $this->dealer->create($validated);
        $user = User::create([
            'name' => $validated["adminname"],
            'email' => $validated["adminemail"],
            'phone' => $validated["adminphone"],
            'role' => "dealer",
            'password' => Hash::make($validated["password"])
        ]);

        // event(new Registered($user));
        // SendEmailVerificationNotification::dispatch($user)->onQueue('emails');

        return json_encode(['status' => 'success', 'message' => 'Dealer account created successfully. And verification link has been sent to your email.']);
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
