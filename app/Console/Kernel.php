<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use Illuminate\Support\Facades\DB;

class Kernel extends ConsoleKernel
{
    /**
     * Define the application's command schedule.
     */
    protected function schedule(Schedule $schedule): void
    {
        $schedule->call(function() {
            $subscriptions = DB::table('dealer_subscription')->where('status', '1')->whereDate('expiry_date','<',date('Y-m-d'))->get();
            foreach ($subscriptions as $key => $value) {
                DB::table('vehicles')->where('user_id',$value->user_id)->orWhere('dealer_id',$value->dealer_id)->update(['priority'=>9,'sponsored'=>0]);
            }
        })->daily();
    }

    /**
     * Register the commands for the application.
     */
    protected function commands(): void
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
