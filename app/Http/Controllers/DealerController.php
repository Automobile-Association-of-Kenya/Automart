<?php

namespace App\Http\Controllers;

use App\Http\Requests\DealerRequest;
use App\Models\Dealer;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class DealerController extends Controller
{
    public function __construct()
    {
        $this->dealer = new Dealer();
        $this->user = new User();
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
        return view('dealers.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(DealerRequest $request)
    {
        $validated = $request->validated();
        $dealer = $this->dealer->create($validated);
        $this->user->name = $validated["adminname"];
        $this->user->email = $validated["adminemail"];
        $this->user->phone = $validated["adminphone"];
        $this->user->password = Hash::make($validated["password"]);
        $this->user->save();
        return json_encode(['status'=>'success', 'message'=>'Dealer account created successfully. And verification link has been sent to your email. ']);
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
