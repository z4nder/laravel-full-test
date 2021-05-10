<?php

namespace Tests\Exam;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Queue;
use Tests\TestCase;

/**
 * Job Test
 * - On this we will check if you know how to:
 *
 * 1. Create a Job
 * 2. Send the Job to the Queue
 *
 * @package Tests\Feature\Exam
 */
class JobTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Create a job that will request for a date and a user
     * it will get a random quote from a api a save
     * as a Daily Log
     *
     * - Get a random quote from https://api.quotable.io/random
     *  ( you can check on ./tests/Fixtures/quotes.http )
     * @test
     */
    public function create_job()
    {
        Queue::fake();

        $user = \App\Models\User::factory()->create();

        $date = Carbon::parse('2020-01-01');

        \App\Jobs\SaveRandomQuote::dispatch($user, $date);

        Queue::assertPushed(\App\Jobs\SaveRandomQuote::class);
    }

    /**
     * Making sure that the job is doing
     * what supposed to do
     * @test
     */
    public function make_sure_that_the_job_worked()
    {
        Http::fake([
            'https://api.quotable.io/random' => Http::response([
                "_id"  => "5U3Qdp9L0OId",
                "tags" => [
                    "famous-quotes",
                ],
                "content" => "Friends are those rare people who ask how we are and then wait to hear the answer.",
                "author"  => "Ed Cunningham",
                "length"  => 82,
            ]),
        ]);

        $user = \App\Models\User::factory()->create();

        $date = Carbon::parse('2020-01-01');

        \App\Jobs\SaveRandomQuote::dispatch($user, $date);

        $this->assertDatabaseHas('daily_logs', [
            'user_id' => $user->id,
            'day'     => '2020-01-01 00:00:00',
            'log'     => 'Friends are those rare people who ask how we are and then wait to hear the answer.',
        ]);
    }

    /**
     * Lets add logs to the job
     *
     * @test
     */
    public function add_logs_to_the_job_so_we_can_debug_later()
    {
        Http::fake([
            'https://api.quotable.io/random' => Http::response([
                "_id"  => "5U3Qdp9L0OId",
                "tags" => [
                    "famous-quotes",
                ],
                "content" => "Friends are those rare people who ask how we are and then wait to hear the answer.",
                "author"  => "Ed Cunningham",
                "length"  => 82,
            ]),
        ]);

        Log::shouldReceive('info')
            ->with('SaveRandomQuote job is running!!! 🧨');

        $user = \App\Models\User::factory()->create();

        $date = Carbon::parse('2020-01-01');

        \App\Jobs\SaveRandomQuote::dispatch($user, $date);
    }
}
