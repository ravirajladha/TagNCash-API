<?php

namespace App\Console;

use App\Console\Commands\CouponDeactivationIndia;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use App\Console\Commands\CouponDeactivationUSA;

class Kernel extends ConsoleKernel
{
    /**
     * Define the application's command schedule.
     */
    protected function schedule(Schedule $schedule): void
    {
        $schedule->command('coupondeactive:india')->dailyAt('00:00')->timezone('Asia/Kolkata');
        $schedule->command('coupondeactive:usa')->dailyAt('00:00')->timezone('America/New_York');
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
