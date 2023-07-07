<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class VehicleImage extends Model
{
    use HasFactory;

    protected $fillable = ['vehicle_id', 'image'];

    public $timestamps = false;

    public function vehicle(): BelongsTo
    {
        return $this->belongsTo(Vehicle::class, 'vehicle_id');
    }

    static function new($vehicle_id, $images)
    {
        foreach ($images as $image) {
            // $vehicleimage = self::where('vehicle_id', $vehicle_id)->where('image', $image)->first();
            // if (!is_null($vehicleimage)) {
                self::create(['vehicle_id' => $vehicle_id, 'image' => $image]);
            // }
        }

    }
}
