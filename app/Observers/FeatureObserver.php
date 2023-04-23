<?php

namespace App\Observers;

use App\Models\Feature;

class FeatureObserver
{

    public function creating(Feature $feature)
    {
        $feature->user_id = auth()->id();
    }
    
    /**
     * Handle the Feature "created" event.
     */
    public function created(Feature $feature): void
    {
        //
    }

    /**
     * Handle the Feature "updated" event.
     */
    public function updated(Feature $feature): void
    {
        //
    }

    /**
     * Handle the Feature "deleted" event.
     */
    public function deleted(Feature $feature): void
    {
        //
    }

    /**
     * Handle the Feature "restored" event.
     */
    public function restored(Feature $feature): void
    {
        //
    }

    /**
     * Handle the Feature "force deleted" event.
     */
    public function forceDeleted(Feature $feature): void
    {
        //
    }
}
