<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Yard extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = ['dealer_id', 'yard', 'address', 'email', 'phone'];


    /**
     * Get all of the vehicles for the Yard
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function vehicles(): HasMany
    {
        return $this->hasMany(Vehicle::class, 'yard_id', 'id');
    }

    /**
     * Get the dealer that owns the Yard
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function dealer(): BelongsTo
    {
        return $this->belongsTo(Dealer::class, 'dealer_id');
    }
}