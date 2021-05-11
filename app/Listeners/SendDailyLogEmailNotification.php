<?php

namespace App\Listeners;

use App\Events\DailyLogCreated;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;

class SendDailyLogEmailNotification
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  DailyLogCreated  $event
     * @return void
     */
    public function handle(DailyLogCreated $event)
    {
      Mail::to($event->dailyLog->user->email)->send(new App\Mail\DailyLogCopy($event->dailyLog));
    }
}
