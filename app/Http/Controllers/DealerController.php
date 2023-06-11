<?php

namespace App\Http\Controllers;

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
        $this->middleware('auth')->except(['create', 'store']);
        $this->dealer = new Dealer();
        $this->user = new User();
        $this->vehicle = new Vehicle();
        $this->auth = auth()->user();
    }

    public function index()
    {
        if (auth()->user() && is_null(auth()->user()->dealer_id)) {
            return redirect()->route('dealer.add');
        } else {
            if (auth()->user() && auth()->user()->role === "dealer") {
                $subscription = $this->dealer->subscription(auth()->user()->dealer_id);
                if (!is_null($subscription)) {
                }else {
                    return redirect()->route('subscription.plan');

                }
            }
        }
        $vehicles = $this->dealer->dealerVehicles();
        $quotes = $this->dealer->quotes();
        $finances = $this->dealer->finances();
        $tradeins = $this->dealer->tradeins();

        return view('dealers.index', compact('vehicles', 'quotes','finances','tradeins'));
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
        $subscription = $this->checksubscription();

        return view('dealers.vehicles', compact('vehicles','str'));
    }

    public function store(DealerRequest $request)
    {
        $validated = $request->validated();
        DB::beginTransaction();
        $dealer = $this->dealer->create($validated);
        if (auth()->user() && !is_null(auth()->user())) {
            $user = $this->user->where('id', auth()->id())->first();
            $user->dealer_id = $dealer->id;
            $user->role = "dealer";
            $user->update();
            $url = "/subscription-plans";
        } else {
            $user = User::create([
                'dealer_id' => $dealer->id,
                'name' => $validated["adminname"],
                'email' => $validated["adminemail"],
                'phone' => $validated["adminphone"],
                'role' => "dealer",
                'password' => Hash::make($validated["password"])
            ]);
            $url = "/login";
        }
        DB::commit();
        // event(new Registered($user));
        // SendEmailVerificationNotification::dispatch($user)->onQueue('emails');

        return json_encode(['status' => 'success', 'url' => $url, 'message' => 'Dealer account created successfully. And verification link has been sent to your email.']);
    }

    public function summary()
    {
        $vehicles = $this->dealer->dealerVehicles();
        $quotes = $this->dealer->dealerQuotes();
    }

    /**
     * Display the specified resource.
     */
    public function requests()
    {
        $quotes = $this->dealer->quotes();
        $finances = $this->dealer->finances();
        $tradeins = $this->dealer->tradeins();
        return view('dealers.requests', compact('quotes', 'finances', 'tradeins'));
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
