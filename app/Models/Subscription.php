<?php

namespace App\Models;

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

    public function subscribe()
    {
        # code...
    }

}
