<?php

namespace App\Http\Controllers;

use App\Models\Dealer;
use App\Models\Finance;
use App\Models\Loan;
use App\Models\Purchase;
use App\Models\Quote;
use App\Models\Subscription;
use App\Models\Tradein;
use App\Models\User;
use App\Models\Vehicle;
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
        $this->vehicle = new Vehicle();
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
            ->count();
        $dealers = User::count();
        return json_encode(['dealers'=>$dealers,'acitivesubscriptions'=>$subscriptions]);
    }

    public function vehiclesWithSubscription() {
        $vehicles = $this->vehicle->where('status','!=','sold')->count();
        $sponsored = $this->vehicle->where('sponsored',"1")->count();
        return json_encode(['vehicles'=>$vehicles,'sponsored'=>$sponsored]);
    }

    public function webtraffic($date = null) {
        $startTime = '07:00:00';
        $endTime = '18:00:00';
        $date = $date ?? date('Y-m-d');
        $query = DB::table('visits')->where('created_at',$date)->whereTime('created_at', '>=', $startTime)->whereTime('created_at', '<=', $endTime);

        // Loop through each hour from 8 to 18 (06:00 PM)
        for ($hour = 8; $hour <= 18; $hour++) {
            $startTime = sprintf('%02d:00:00', $hour); // Format the hour with leading zeros
            $endTime = sprintf('%02d:59:59', $hour);   // End time is the last minute of the hour

            // Add the query for the current hour using unionAll
            $query->unionAll(function ($query) use ($startTime, $endTime) {
                $query->whereTime('created_at', '>=', $startTime)->whereTime('created_at', '<=', $endTime);
            });
        }

        // Get the final result
        $data = $query->get();
        return $data;
    }

}
