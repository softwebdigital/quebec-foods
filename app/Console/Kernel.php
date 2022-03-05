<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        // $schedule->command('inspire')->hourly();

        $schedule->command('backup:clean')->twiceDaily(0, 12);
        $schedule->command('backup:run --only-db')->twiceDaily(0, 12);
        $schedule->command('settings:generate')
                    ->everyMinute();
        $schedule->command('investment:settle')
                    ->withoutOverlapping()
                    ->everyMinute();
        $schedule->command('transaction:notify')
                    ->withoutOverlapping()
                    ->everyMinute();
        $schedule->command('transaction:notify')
                    ->withoutOverlapping()
                    ->everyMinute();
        $schedule->command('maturity:notify')
                    ->withoutOverlapping()
                    ->dailyAt('00:00');
        $schedule->command('payments:settle')
                    ->withoutOverlapping()
                    ->everyMinute();
        $schedule->command('users:delete')
                    ->withoutOverlapping()
                    ->everyMinute();
    }

    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
