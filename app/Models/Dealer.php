<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

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
}
