<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class VehicleModel extends Model
{
    use HasFactory;

    protected $fillable = ['user_id','make_id', 'model'];

    public $timestamps = false;

    public function make(): BelongsTo
    {
        return $this->belongsTo(Make::class, 'make_id');
    }

    public function vehicles(): HasMany
    {
        return $this->hasMany(Vehicle::class, 'vehicle_model_id', 'id');
    }

    public function tradeInStore(): HasMany
    {
        return $this->hasMany(Tradein::class, 'vehicle_model_id', 'id');
    }

}
