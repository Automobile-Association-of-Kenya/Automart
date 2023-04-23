<?php

namespace App\Observers;

use App\Models\Make;

class MakeObserver
{

    public function creating(Make $make)
    {
        $make->user_id = auth()->id();
    }
    /**
     * Handle the Make "created" event.
     */
    public function created(Make $make): void
    {
        //
    }

    /**
     * Handle the Make "updated" event.
     */
    public function updated(Make $make): void
    {
        //
    }

    /**
     * Handle the Make "deleted" event.
     */
    public function deleted(Make $make): void
    {
        //
    }

    /**
     * Handle the Make "restored" event.
     */
    public function restored(Make $make): void
    {
        //
    }

    /**
     * Handle the Make "force deleted" event.
     */
    public function forceDeleted(Make $make): void
    {
        //
    }
}
