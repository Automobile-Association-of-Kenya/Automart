<?php

namespace App\Observers;

use App\Models\VehicleModel;

class ModelObserver
{

    public function creating(VehicleModel $model): void
    {
        $model->user_id = auth()->id();
    }
    
    /**
     * Handle the VehicleModel "created" event.
     */
    public function created(VehicleModel $vehicleModel): void
    {
        //
    }

    /**
     * Handle the VehicleModel "updated" event.
     */
    public function updated(VehicleModel $vehicleModel): void
    {
        //
    }

    /**
     * Handle the VehicleModel "deleted" event.
     */
    public function deleted(VehicleModel $vehicleModel): void
    {
        //
    }

    /**
     * Handle the VehicleModel "restored" event.
     */
    public function restored(VehicleModel $vehicleModel): void
    {
        //
    }

    /**
     * Handle the VehicleModel "force deleted" event.
     */
    public function forceDeleted(VehicleModel $vehicleModel): void
    {
        //
    }
}
