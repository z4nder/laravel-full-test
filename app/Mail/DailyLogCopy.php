<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

use \App\Models\DailyLog;

class DailyLogCopy extends Mailable
{
    use Queueable, SerializesModels;

    public $dailyLog;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(DailyLog $dailyLog)
    {
      
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
      dd("OK");
      return $this->view('emails.new_daily_log')
      ->subject('Daily Log Created with Success !!!')
      ->with([
        'dailyLog' => $this->dailyLog
      ]);
    }
}
