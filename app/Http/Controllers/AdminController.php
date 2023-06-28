<?php

namespace App\Http\Controllers;

use App\Models\Finance;
use App\Models\Quote;
use App\Models\Tradein;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    function __construct()
    {
        $this->middleware('admin');
        $this->quote = new Quote();
        $this->tradein = new Tradein();
        $this->finance = new Finance();
        $this->user = new User();
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $summary = $this->user->summary();
        return view('admin.index');
    }

    public function vehicles()
    {
        $str = strtotime(date('Y-m-d H:i:s')) . auth()->id();
        return view('admin.vehicles', compact('str'));
    }

    public function users()
    {
        return view('users.index');
    }

    public function accounts()
    {
        return view('accounts.index');
    }

    public function requests()
    {
        $quotes = $this->quote->with('vehicle')->latest()->get();
        $tradeins = $this->tradein->with('vehicle')->latest()->get();
        $finances = $this->finance->with('vehicle')->latest()->get();
        return view('admin.requests', compact('quotes', 'tradeins', 'finances'));
    }

    /**
     * Display a listing of the resource.
     */
    public function settings()
    {
        return view('settings.index');
    }

    public function reports()
    {
        return view('admin.reports');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
