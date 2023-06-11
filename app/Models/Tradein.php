<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Tradein extends Model
{
    use HasFactory;

    protected $fillable = [
        'vehicle_id',
        'name',
        'email',
        'phone',
        'make_id',
        'vehicle_model_id',
        'year',
        'reg_no',
    ];

    /**
     * Get the Vehicle that owns the Tradein
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function Vehicle(): BelongsTo
    {
        return $this->belongsTo(Vehicle::class, 'vehicle_id');
    }

    /**
     * Get the make that owns the Tradein
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function make(): BelongsTo
    {
        return $this->belongsTo(Make::class, 'make_id');
    }

    /**
     * Get the model that owns the Tradein
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function model(): BelongsTo
    {
        return $this->belongsTo(VehicleModel::class, 'vehicle_model_id');
    }
}
