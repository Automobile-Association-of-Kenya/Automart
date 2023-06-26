<?php

namespace App\Http\Controllers;

use App\Events\Dealer as EventsDealer;
use App\Http\Requests\DealerRequest;
use App\Jobs\SendEmailVerificationNotification;
use App\Models\Dealer;
use App\Models\User;
use App\Models\Vehicle;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DealerController extends Controller
{
    public $auth;

    public function __construct()
    {
        $this->middleware('auth');
        $this->dealer = new Dealer();
        $this->user = new User();
        $this->vehicle = new Vehicle();
        $this->auth = auth()->user();
    }

    public function index()
    {
        $this->dealer->checkstatus();
        $summary = $this->dealer->summary();
        return view('dealers.index', compact('summary'));
    }

    public function create()
    {
        if (auth()->user() && is_null(auth()->user()->dealer_id)) {
            return redirect()->route('dealer.add');
        }
        return view('dealers.create');
    }

    public function add()
    {
        return view('dealers.add');
    }

    public function vehicles()
    {
        $str = strtotime(date('Y-m-d H:i:s')) . auth()->id();
        $vehicles = $this->dealer->dealerVehicles();
        return view('dealers.vehicles', compact('vehicles', 'str'));
    }

    public function store(Request $request)
    {
        if (!is_null(auth()->user()->dealer_id)) {
            return json_encode(['status' => 'info', 'message' => 'Business information already exist for this user']);
        }
        $dealer = $this->dealer->getbyemailorphone($request->email,$request->phone);
        if (!is_null($dealer)) {
            if (isset($request->continue)) {
                new EventsDealer($dealer,auth()->user());
            }else {
                $message = "A dealer with these details <strong>" . $dealer->name . "</strong>  <strong>" . $dealer->email . "</strong> already exists do you want to be added to the same dealer? Note! All your ads will be under this dealer! You an also change your details in this form and save";
                return json_encode(['status' => 'data', 'message' => $message]);
            }
        }else {
            $dealer = $this->dealer->add($request);
            new EventsDealer($dealer, auth()->user());
        }
        return json_encode(['status' => 'success', 'message' => 'Dealer account created successfully. And verification link has been sent to your email.']);
    }

    public function summary()
    {
        $vehicles = $this->dealer->dealerVehicles();
        $quotes = $this->dealer->dealerQuotes();
    }

    public function requests()
    {
        $quotes = $this->dealer->quotes();
        $finances = $this->dealer->finances();
        $tradeins = $this->dealer->tradeins();
        return view('dealers.requests', compact('quotes', 'finances', 'tradeins'));
    }

    public function getDealers()
    {
        $dealers = $this->dealer->select('id', 'name', 'email', 'phone', 'alt_phone', 'address')->get();
        return json_encode($dealers);
    }
}
