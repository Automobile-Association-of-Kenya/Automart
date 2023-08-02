<?php

namespace App\Http\Controllers;

use App\Events\Dealer as EventsDealer;
use App\Events\Purchase as EventsPurchase;
use App\Models\Dealer;
use App\Models\Purchase;
use App\Models\User;
use App\Models\Vehicle;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DealerController extends Controller
{
    public $auth;

    public function __construct()
    {
        $this->middleware('auth');
        $this->dealer = new Dealer();
        $this->user = new User();
        $this->vehicle = new Vehicle();
        $this->purchase = new Purchase();
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

    public function vehicles()
    {
        $this->dealer->checkstatus();
        $str = strtotime(date('Y-m-d H:i:s')) . auth()->id();
        $vehicles = $this->dealer->dealerVehicles();
        return view('dealers.vehicles', compact('vehicles', 'str'));
    }

    public function store(Request $request)
    {
        if (!is_null(auth()->user()->dealer_id)) {
            return json_encode(['status' => 'info', 'message' => 'Business information already exist for this user']);
        }
        $dealer = $this->dealer->getbyemailorphone($request->email, $request->phone);
        if (!is_null($dealer)) {
            if (isset($request->continue)) {
                new EventsDealer($dealer, auth()->user());
            } else {
                $message = "A dealer with these details <strong>" . $dealer->name . "</strong>  <strong>" . $dealer->email . "</strong> already exists do you want to be added to the same dealer? Note! All your ads will be under this dealer! You an also change your details in this form and save";
                return json_encode(['status' => 'data', 'message' => $message]);
            }
        } else {
            $dealer = $this->dealer->add($request);
            new EventsDealer($dealer, auth()->user());
        }
        return json_encode(['status' => 'success', 'message' => 'Dealer account created successfully. And verification link has been sent to your email.']);
    }

    public function update(Request $request) {
        $validated = $request->validate([
            'name' => ['required', 'max:80'],
            'phone' => ['required', 'max:14', 'unique:dealers,phone,'. $request->dealer_id],
            'alt_phone' => ['required', 'max:14'],
            'email' => ['nullable', 'max:60', 'unique:dealers,email,'. $request->dealer_id],
            'postal_address' => ['nullable', 'max:100'],
            'address' => ['nullable', 'max:100'],
            'city' => ['nullable', 'max:80'],
            'logo' => ['nullable', 'file', 'mimes:jpeg,png', 'max:200'],
        ]);
        $fileName = "";
        if ($request->hasFile('logo')) {
            $logo = $request->file('logo');
            $fileName .= uniqid() . '.' . $logo->getClientOriginalExtension();
            $logo->move("brands/", $fileName);
            $validated["logo"] = $fileName;
        }
        // return $validated["logo"];
        if (isset($request->dealer_id)) {
            $dealer = $this->dealer->find($request->dealer_id);
            $fileName = (strlen($fileName > 2)) ? $fileName : $dealer->logo;
            if (!is_null($dealer)) {
                $dealer->update($validated);
            }
            $message = "Dealer Info updated successfully";
        } else {
            $dealer = $this->dealer->create($validated);
            new EventsDealer($dealer, auth()->user());
            $message = "Dealer Info created successfully";
        }
        return redirect()->back()->with('success',$message);
        // return redirect()->back()->with('success',$message);
        // return json_encode(["status"=>'success','message'=>$message]);

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
        $purchases = $this->dealer->purchases();
        return view('dealers.requests', compact('quotes', 'finances', 'tradeins', 'purchases'));
    }

    public function getDealers()
    {
        $dealers = $this->dealer->withCount('vehicles')->latest()->get();
        return json_encode($dealers);
    }

    public function purchaseapprove($id)
    {
        $purchase = $this->purchase->with('vehicle')->find($id);
        $vehicle = $purchase->vehicle;
        DB::beginTransaction();
        $vehicle->update(['status' => 'sold', 'sold_at' => date('Y-m-d H:i:s')]);
        $purchase->update(['status' => 'approved']);
        DB::commit();
        new EventsPurchase('approval', $purchase);
        return redirect()->back()->with('success', 'Purchase approval was successful.');
    }

    public function purchasedecline(Request $request)
    {
        return $request;
    }

    public function subscription()
    {
        $query = DB::table('dealer_subscription');
        if (!is_null(auth()->user()?->dealer_id)) {
            $query->where('dealer_id', auth()->user()?->dealer_id);
        }else {
            $query->where('user_id', auth()->id());
        }
        $subscription = $query->where('expiry_date', '>', date('Y-m-d H:I:s'))->latest()->first();
        return json_encode($subscription);
    }

    // function FunctionName() : Returntype {

    // }
}
