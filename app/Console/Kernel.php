<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

use App\Jobs\NoTeamJob;
use App\Jobs\PendingOrdersJob;

class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
        //
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        // $schedule->command('inspire')
        //          ->hourly();

        /**********************
         * CANCEL ORDER MAILS
         **********************/

        $schedule->job(new PendingOrdersJob())->dailyAt('05:00')->timezone('Europe/Brussels');

        /**********************
         * NO TEAM MAILS
         **********************/

        $schedule->job(new NoTeamJob())->weeklyOn('1','06:00')->timezone('Europe/Brussels');
        $schedule->job(new NoTeamJob())->weeklyOn('3','06:00')->timezone('Europe/Brussels');
        $schedule->job(new NoTeamJob())->weeklyOn('5','06:00')->timezone('Europe/Brussels');
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
