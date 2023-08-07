<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ReportController extends Controller
{

    public function index()
    {
        return view('admin.reports');
    }

    public function filter(Request $request) {
        // $quotes = $this->quote->with('vehicle')->latest()->paginate(10);
        // $tradeins = $this->tradein->with('vehicle')->latest()->paginate(10);
        // $finances = $this->finance->with('vehicle')->latest()->paginate(10);
        // $loans = $this->loan->with('vehicle.user', 'vehicle.dealer', 'industry', 'country')->latest()->paginate(10);
        // $purchases = $this->purchase->latest()->paginate(10);
        if ($request->report === "") {
            # code...
        }
    }
}
