<?php

namespace App\Jobs;

use Illuminate\Auth\Notifications\VerifyEmail;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Str;

class SendEmailVerificationNotification implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $user;
    /**
     * Create a new job instance.
     */
    public function __construct($user)
    {
        $this->user = $user;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $user = $this->user;
        VerifyEmail::toMailUsing(function ($notifiable) {
            $verifyUrl = URL::temporarySignedRoute(
                'verification.verify',
                now()->addMinutes(240),
                ['id' => $notifiable->getKey(), 'hash' => Str::random(40)]
            );

            return (new MailMessage)
                ->subject('Verify your email address')
                ->line('Please click the button below to verify your email address.')
                ->action('Verify Email Address', $verifyUrl)
                ->line('If you did not create an account, no further action is required.');
        });
    }
}
