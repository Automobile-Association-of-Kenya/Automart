<?php

namespace App\Models;

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

    /**
     * Get all of the vehicles for the Dealer
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
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
        $vehicles = Vehicle::where('dealer_id', auth()->user()->dealer_id)
            ->with(['type' => function ($type) {
                return $type->select('id', 'type');
            }, 'make' => function ($make) {
                return $make->select('id', 'make');
            }, 'model' => function ($model) {
                return $model->select('id', 'model');
            }, 'prices' => function ($query) {
                return $query->select('id', 'price');
            }, 'yard' => function ($yard) {
                return $yard->select('id', 'yard');
            }, 'features' => function ($fea) {
                return $fea->select('features.id', 'features.feature');
            }])->latest()->get();

        return $vehicles;
    }

    public function quotes()
    {
        $vehicles = Vehicle::where('dealer_id',auth()->user()->dealer_id)->pluck('id');
        $quotes = Quote::whereIn('vehicle_id', $vehicles)->with('vehicle')->get();
        return $quotes;
    }

    public function finances()
    {
        $vehicles = Vehicle::where('dealer_id', auth()->user()->dealer_id)->pluck('id');
        $finances = Finance::whereIn('vehicle_id', $vehicles)->with('vehicle')->get();
        return $finances;
    }

    public function tradeins()
    {
        $vehicles = Vehicle::where('dealer_id', auth()->user()->dealer_id)->pluck('id');
        $tradeins = Tradein::whereIn('vehicle_id', $vehicles)->with('vehicle')->get();
        return $tradeins;
    }

    /**
     * The subscriptions that belong to the Dealer
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function subscriptions(): BelongsToMany
    {
        return $this->belongsToMany(Subscription::class, 'dealer_subscription', 'dealer_id', 'subscription_id')->withPivot('status','start_date','expiry_date')->wherePivot('status',1);
    }

    public function checkDealerSubscription($dealer_id)
    {
        $dealer = $this->where('id',$dealer_id)->with('subscriptions')->first();
        $subscriptions  = $dealer->subscriptions;
        foreach ($subscriptions as $key => $value) {
            if (!is_null($value->pivot->expiry_date) && $value->pivot->expiry_date > now()) {
                return $value;
            }else {
                return redirect()->route('subscription.plan');
            }
        }
    }

    public function checkonfreesubscription($subscription)
    {
        if (is_null($subscription->cost) || $subscription->cost == 0) {
            return "You are currently subscribed to $subscription->name which may not give you the bes services on our plartform";
        }
    }
}
