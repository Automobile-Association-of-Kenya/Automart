<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Yard extends Model
{
    use HasFactory;

    public $timestamps = false;

    /**
     * Get all of the vehicles for the Yard
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function vehicles(): HasMany
    {
        return $this->hasMany(Vehicle::class, 'yard_id', 'id');
    }
}
