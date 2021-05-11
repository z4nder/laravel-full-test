<?php

namespace App\Jobs;

use Carbon\Carbon;
use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Support\Facades\Http;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

class SaveRandomQuote implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $user;
    protected $date;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(User $user,  Carbon $date)
    {
       $this->user = $user;
       $this->date = $date;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $response = Http::get('https://api.quotable.io/random')->json()['content'];

        $this->user->dailyLogs()->create([
            'log' => $response,
            'day' => $this->date
        ]);
    }
}
