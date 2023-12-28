<?php

namespace App\Console;


use App\Jobs\CalculateTransactionDailyAmount;
use App\Services\CalculateTransactionsDailyAmount;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * Define the application's command schedule.
     */
    protected function schedule(Schedule $schedule): void
    {
        $schedule->job(new CalculateTransactionDailyAmount(new CalculateTransactionsDailyAmount)) ->dailyAt('23:59');;
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
