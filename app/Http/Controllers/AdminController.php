<?php

namespace App\Http\Controllers;

use App\Models\Finance;
use App\Models\Loan;
use App\Models\Purchase;
use App\Models\Quote;
use App\Models\Subscription;
use App\Models\Tradein;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    function __construct()
    {
        $this->middleware('admin');
        $this->quote = new Quote();
        $this->tradein = new Tradein();
        $this->finance = new Finance();
        $this->user = new User();
        $this->loan = new Loan();
        $this->purchase = new Purchase();
        $this->subscription = new Subscription();
    }

    public function index()
    {
        $summary = $this->user->summary();
        return view('admin.index', compact('summary'));
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
        $quotes = $this->quote->with('vehicle')->latest()->paginate(10);
        $tradeins = $this->tradein->with('vehicle')->latest()->paginate(10);
        $finances = $this->finance->with('vehicle')->latest()->paginate(10);
        $loans = $this->loan->with('vehicle.user', 'vehicle.dealer','industry','country')->latest()->paginate(10);
        $purchases = $this->purchase->latest()->paginate(10);
        return view('admin.requests', compact('quotes', 'loans', 'tradeins', 'finances', 'purchases'));
    }

    public function settings()
    {
        return view('settings.index');
    }

    public function reports()
    {
        return view('admin.reports');
    }

    public function subscriptions() {
        $data = collect();
        $date = Carbon::now();
        $subscriptions = DB::table('dealer_subscription')
        ->select('subscription_id', DB::raw('COUNT(*) AS subscriptions'))
        ->where('expiry_date', '>', $date)
            ->groupBy('subscription_id')
            ->get();
        foreach ($subscriptions as $key => $value) {
            $subscription = $this->subscription->find($value->subscription_id);
            $data->push(['subscription'=>$subscription->name, 'subscriptions'=>$value->subscriptions]);
        }
        return $data;
    }

    public function dealersWithSubscriptions() {
        $date = Carbon::now();
        $subscriptions =  DB::table('dealer_subscription')
        ->select('subscription_id')
        ->where('expiry_date', '>', $date)
            ->groupBy('subscription_id')
            ->get();
    }

}
