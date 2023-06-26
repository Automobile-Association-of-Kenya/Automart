<?php

namespace App\Models;

use App\Events\Dealer as EventsDealer;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;
use Illuminate\Support\Facades\DB;

class Dealer extends Model
{
    use HasFactory;

    protected $fillable = [
        "name",
        "email",
        "phone",
        "alt_phone",
        "address",
    ];

    public function add($request) {
        $dealer = $this->create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'alt_phone' => $request->alt_phone,
            'postal_address' => $request->postal_address,
            'address' => $request->address,
            'city' => $request->city,
        ]);
        return $dealer;
    }

    public function vehicles(): HasMany
    {
        return $this->hasMany(Vehicle::class, 'dealer_id', 'id');
    }

    /**
     * Get all of the users for the Dealer
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function users(): HasMany
    {
        return $this->hasMany(User::class, 'dealer_id', 'id');
    }

    /**
     * Get all of the yards for the Dealer
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function yards(): HasMany
    {
        return $this->hasMany(Yard::class, 'dealer_id', 'id');
    }

    public function subscription($dealer_id)
    {
        return DB::table('dealer_subscription')->where('dealer_id', $dealer_id)->where('status', 'active')->latest()->first();
    }

    /**
     * Get all of the payments for the Dealer
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function payments(): HasMany
    {
        return $this->hasMany(Payment::class, 'dealer_id', 'id');
    }

    public function dealerVehicles()
    {
        $vehicles = $this->initialize()->with(['type:id,type', 'make:id,make', 'model:id,model', 'prices:id,price', 'yard:id,yard', 'features:id,feature'])->latest()->get();
        return $vehicles;
    }

    public function summary() {
        $vehiclescount = $this->initialize()->count();
        $todaysvehiclecount = $this->initialize()->where('created_at',Carbon::today())->count();
        $countvehiclessold = $this->initialize()->where('status','sold')->count();
        $soldtodaycount = $this->initialize()->where('sold_at',Carbon::today())->count();
        $views = $this->initialize()->sum('views');
        $todayviews = count($this->todayviews());
        $income = $this->initialize()->where('status','sold')->sum('price');
        $incometoday = $this->initialize()->where('sold_at',Carbon::today())->sum('price');
        $financescount = count($this->finances());
        $quotescount = count($this->quotes());
        $tradeinscount = count($this->tradeins());
        $financescounttoday = count($this->financestoday());
        $quotescounttoday = count($this->quotestoday());
        $tradeinscounttoday = count($this->tradeinstoday());

        return ['vehiclescount'=>$vehiclescount, 'todaysvehiclecount'=>$todaysvehiclecount, 'countvehiclessold'=>$countvehiclessold, 'soldtodaycount'=>$soldtodaycount, 'views'=>$views, 'todayviews'=> $todayviews, 'income'=>$income, 'incometoday'=>$incometoday, 'financescount'=>$financescount, 'quotescount'=>$quotescount, 'tradeinscount'=>$tradeinscount, 'financescounttoday'=>$financescounttoday, 'quotescounttoday'=>$quotescounttoday, 'tradeinscounttoday'=>$tradeinscounttoday];
    }

    public function quotes()
    {
        $vehicles = $this->initialize()->pluck('id');
        $quotes = Quote::whereIn('vehicle_id', $vehicles)->with('vehicle')->get();
        return $quotes;
    }

    function todayviews() {
        $vehicles = $this->initialize()->pluck('id');
        $views = View::where('created_at',Carbon::today())->get();
        return $views;
    }

    function quotestoday()
    {
        $vehicles = $this->initialize()->pluck('id');
        $quotes = Quote::whereIn('vehicle_id', $vehicles)->where('created_at', Carbon::today())->get();
        return $quotes;
    }

    public function finances()
    {
        $vehicles = $this->initialize()->pluck('id');
        $finances = Finance::whereIn('vehicle_id', $vehicles)->with('vehicle')->get();
        return $finances;
    }

    function financestoday() {
        $vehicles = $this->initialize()->pluck('id');
        $finances = Finance::whereIn('vehicle_id', $vehicles)->where('created_at',Carbon::today())->get();
        return $finances;
    }

    public function tradeins()
    {
        $vehicles = $this->initialize()->pluck('id');
        $tradeins = Tradein::whereIn('vehicle_id', $vehicles)->with('vehicle')->get();
        return $tradeins;
    }

    function tradeinstoday()
    {
        $vehicles = $this->initialize()->pluck('id');
        $tradeins = Tradein::whereIn('vehicle_id', $vehicles)->where('created_at', Carbon::today())->get();
        return $tradeins;
    }

    function initialize() {
        $query = Vehicle::query();
        if (!is_null(auth()->user()->dealer_id)) {
            $query->where('dealer_id', auth()->user()->dealer_id);
        } else {
            $query->orWhere('user_id', auth()->id());
        }
        return $query;
    }

    public function subscriptions(): BelongsToMany
    {
        return $this->belongsToMany(Subscription::class, 'dealer_subscription', 'dealer_id', 'subscription_id')->withPivot('status','start_date','expiry_date')->wherePivot('status',1);
    }

    public function checkstatus() {
        if (auth()->user()->role === "dealer" && auth()->user()->dealer_id == null) {
            session()->put('dealerinfo', "You can add your bsuness related infomartion to get a better experience <a href='#' data-toggle='modal' data-target='#addBusinessModal' class='btn btn-light btn-sm alert-link'>Click here</a>");
        }
        $subscription = $this->checkDealerSubscription();
        if (is_null($subscription) || count($subscription) <= 0) {
            session()->put("subscriptioninfo", "You are not subscribed to any of our subscription plans to promote your ads. Promote now <a href='/subscription-plans' _target='_blank' class='btn btn-light btn-sm alert-link'>&nbsp;Click here</a>");
            // data-toggle='modal' data-target='#subscriptionPlansModal'
        }
        $vehicles = $this->initialize()->where('status','<>','sold')->get();

        if (is_null($vehicles) || count($vehicles)) {
            session()->put("advertinfo", "You are have not advertised on our platform. Get a classified advertisement experience by posting your cars for sale here <a href='dealer/vehicles'  class='btn btn-light btn-sm alert-link'>Click here</a>");
        }
    }

    public function checkDealerSubscription()
    {
        if (!is_null(auth()->user()->dealer_id)) {
             $dealer = $this->find(auth()->user()->dealer_id);
            $subscriptions = $dealer->subscriptions()->wherePivot('expiry_date','>',Carbon::now())->get();
        }else {
            $user = User::find(auth()->id());
            $subscriptions = $user->subscriptions()->wherePivot('expiry_date', '>', Carbon::now())->get();
        }

        return $subscriptions;
    }


    public function getbyemailorphone($email,$phone) {
        $query = $this->query();
        if (!is_null($email)) {
            $query->where('email',$email);
        }
        if (!is_null($phone)) {
            $query->orWhere('phone', $phone);
        }
        return $query->first();
    }
}
