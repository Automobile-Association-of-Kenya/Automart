<?php

namespace App\Observers;

use App\Models\Maillist;

class MaillistObserver
{

    public function creating(Maillist $mail)
    {
        $mail->user_id = auth()->id();
    }

    /**
     * Handle the Maillist "created" event.
     */
    public function created(Maillist $maillist): void
    {
        //
    }

    public function updating(Maillist $mail)
    {
        $mail->updated_by = auth()->id();
    }

    /**
     * Handle the Maillist "updated" event.
     */
    public function updated(Maillist $maillist): void
    {
        //
    }

    /**
     * Handle the Maillist "deleted" event.
     */
    public function deleted(Maillist $maillist): void
    {
        //
    }

    /**
     * Handle the Maillist "restored" event.
     */
    public function restored(Maillist $maillist): void
    {
        //
    }

    /**
     * Handle the Maillist "force deleted" event.
     */
    public function forceDeleted(Maillist $maillist): void
    {
        //
    }
}
