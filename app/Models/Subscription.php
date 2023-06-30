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
        'priority',
        'cost',
        'billingcycle',
        'description'
    ];

    public function createProperties($id, $properties)
    {
        foreach ($properties as $value) {
            DB::table('subscription_property')->insert([
                'subscription_id'=>$id,
                'subsproperty_id'=>$value,
            ]);
        }
    }

    public function updateProperties($id, $properties)
    {
        $props = DB::table('subscription_property')->where('subscription_id', $id)->pluck('subsproperty_id');
        foreach ($props as $value) {
            if (!in_array($value, array_map('intval', $properties))) {
                DB::table('subscription_property')->where('subscription_id', $id)->where('subsproperty_id',$value)->delete();
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

    public function subscribe($user, $subscription_id)
    {
        $subscription = $this->find($subscription_id);
        if ($subscription->billingcycle === "Monthly") {
            $expiry = Carbon::now()->addMonth();
        }elseif($subscription->billingcycle === "Yearly"){
            $expiry = Carbon::now()->addYear();
        }else{
            $expiry = Carbon::now()->addDays($subscription->billingcycle);
        }
        $dealer_id = auth()->user()->dealer_id ?? null;
        DB::table('dealer_subscription')->insert(['user_id'=>auth()->id(),'dealer_id'=>$dealer_id, 'subscription_id'=>$subscription_id, 'start_date'=>date('Y-m-d H:i:s'), 'expiry_date'=>$expiry, 'status'=>1]);
        new EventsSubscription(auth()->user(),$subscription);
    }

    /**
     * The dealers that belong to the Subscription
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function dealers(): BelongsToMany
    {
        return $this->belongsToMany(Dealer::class, 'dealer_subscription', 'dealer_id', 'subscription_id');
    }

    /**
     * The users that belong to the Subscription
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function users(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'dealer_subscription', 'user_id', 'subscription_id')->withPivot('status', 'start_date', 'expiry_date')->wherePivot('status', 1);
    }

    /**
     * Get all of the payments for the Subscription
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function payments(): HasMany
    {
        return $this->hasMany(Payment::class, 'subscription_id', 'id');
    }

}
