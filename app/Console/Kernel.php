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
        $schedule->command('sitemap:generate')->daily()->withoutOverlapping()->onOneServer();
        //$schedule->command('site:index')->everyTwoHours()->withoutOverlapping()->onOneServer();
        $schedule->command('request:highlights')->hourly()->withoutOverlapping()->onOneServer();
        $schedule->command('get:predictions')->twicedailyAt('07:00','01:00')->withoutOverlapping()->onOneServer();
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
