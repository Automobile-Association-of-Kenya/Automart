<?php

namespace App\Models;

use App\Events\Subscription as EventsSubscription;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\DB;

class Subscription extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'user_id',
        'name',
        'type',
        'priority',
        'cost',
        'billingcycle',
        'description'
    ];

    public function createProperties($id, $properties)
    {
        foreach ($properties as $value) {
            DB::table('subscription_property')->insert([
                'subscription_id' => $id,
                'subsproperty_id' => $value,
            ]);
        }
    }

    public function updateProperties($id, $properties)
    {
        $props = DB::table('subscription_property')->where('subscription_id', $id)->pluck('subsproperty_id');
        foreach ($props as $value) {
            if (!in_array($value, array_map('intval', $properties))) {
                DB::table('subscription_property')->where('subscription_id', $id)->where('subsproperty_id', $value)->delete();
            }
        }

        foreach ($properties as $value) {
            $prop = DB::table('subscription_property')->where('subscription_id', $id)->where('subsproperty_id', $value)->first();
            if (empty($prop) || is_null($prop)) {
                DB::table('subscription_property')->insert([
                    'subscription_id' => $id,
                    'subsproperty_id' => $value,
                ]);
            }
        }
    }

    public function properties(): BelongsToMany
    {
        return $this->belongsToMany(Subsproperty::class, 'subscription_property', 'subscription_id', 'subsproperty_id');
    }

    public function subscribe($payment)
    {
        $subscription = $this->find($payment->subscription_id);
        if ($subscription->billingcycle === "Monthly") {
            $expiry = Carbon::now()->addMonth();
        } elseif ($subscription->billingcycle === "Yearly") {
            $expiry = Carbon::now()->addYear();
        } else {
            $expiry = Carbon::now()->addDays($subscription->billingcycle);
        }
        $dealer_id = $payment->dealer_id ?? null;
        DB::table('dealer_subscription')->insert(['user_id' => $payment->user_id, 'dealer_id' => $dealer_id, 'subscription_id' => $payment->subscription_id, 'start_date' => date('Y-m-d H:i:s'), 'expiry_date' => $expiry, 'status' => 1]);
        if (session()->has('subscriptioninfo')) {
            session()->forget('subscriptioninfo');
        }
        event(new EventsSubscription(auth()->user(), $subscription));
    }

    public function dealers(): BelongsToMany
    {
        return $this->belongsToMany(Dealer::class, 'dealer_subscription', 'dealer_id', 'subscription_id');
    }

    public function users(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'dealer_subscription', 'user_id', 'subscription_id')->withPivot('status', 'start_date', 'expiry_date')->wherePivot('status', 1);
    }

    public function payments(): HasMany
    {
        return $this->hasMany(Payment::class, 'subscription_id', 'id');
    }

    function packages()
    {
        $propids = Subsproperty::pluck('id')->toArray();
        $subscriptions = Subscription::with('properties:id,name')->orderBy('cost', 'ASC')->get();
        $data = collect();
        foreach ($subscriptions as $key => $value) {
            $properties = collect();
            foreach ($value->properties as $item) {
                if (in_array($item->id,$propids)) {
                    $properties->push(true);
                }else{
                    $properties->push(false);
                }
            }
            $value->properties = $properties;
            $data->push($value);
        }
        return $data;

        // $subscriptionsWithProperties = $subscriptions->map(function ($subscription) use ($propIds) {
        //     $subscription->isPropertyExists = in_array($subscription->properties->id, $propIds);
        //     return $subscription;
        // });
    }
}
