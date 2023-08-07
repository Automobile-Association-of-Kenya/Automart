<?php

namespace App\Http\Controllers;

use App\Models\Finance;
use App\Models\Loan;
use App\Models\Purchase;
use App\Models\Quote;
use App\Models\Tradein;
use Illuminate\Http\Request;

class ReportController extends Controller
{

    public function __construct()
    {
        $this->quote = new Quote();
        $this->tradein = new Tradein();
        $this->finance = new Finance();
        $this->loan = new Loan();
        $this->purchase = new Purchase();
    }

    public function index()
    {
        return view('admin.reports');
    }

    public function filter(Request $request) {
        if ($request->report === "quote") {
            $query = $this->quote->query();
        }
        if ($request->report === "sale") {
            $query = $this->purchase->query();
        }
        if ($request->report === "loan") {
            $query = $this->loan->query();
        }
        if ($request->report === "tradeins") {
            $query = $this->loan->query();
        }
        if ($request->start !== null) {
            $query->whereDate('created_at', '>=', $request->start);
        }
        if ($request->end !== null) {
            $query->whereDate('created_at', '<=', $request->end);
        }
        $data = $query->with('vehicle')->latest()->get();
        return json_encode($data);
    }
}
