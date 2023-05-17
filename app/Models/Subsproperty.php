<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Subsproperty extends Model
{
    use HasFactory;

    protected $fillable = ['name'];

    /**
     * The subscriptions that belong to the Subsproperty
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */

    public function subscriptions(): BelongsToMany
    {
        return $this->belongsToMany(Subscription::class, 'subscription_property', 'subscription_id', 'subsproperty_id');
    }

}
