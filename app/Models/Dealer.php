<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
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

    public function dealerSubscription()
    {
        $subscriptions = '';
    }
}
