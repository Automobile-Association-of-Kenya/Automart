<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Type extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = ['type'];

    /**
     * Get all of the vehicles for the Type
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function vehicles(): HasMany
    {
        return $this->hasMany(Vehicle::class, 'type_id', 'id');
    }
    
}
