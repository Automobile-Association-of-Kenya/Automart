<?php

namespace App\Http\Controllers;

use App\Models\Country;
use App\Models\County;
use Illuminate\Http\Request;

class ApplicationController extends Controller
{
    public function __construct()
    {
        $this->country = new Country();
        $this->county = new County();
    }

    public function welcome()
    {
        return view('welcome');
    }

    public function dashboard()
    {
        return view('dashboard.index');
    }

    public function countries()
    {
        $countries = $this->country->get();
        return json_encode($countries);
    }

    public function counties($country_id)
    {
        $counties = $this->county->select('id','name')->where('country_id',$country_id)->get();
        return json_encode($counties);
    }

    public function index()
    {

    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show(string $id)
    {
        //
    }

    public function edit(string $id)
    {
        //
    }

    public function update(Request $request, string $id)
    {
        //
    }

    public function destroy(string $id)
    {
        //
    }
}
