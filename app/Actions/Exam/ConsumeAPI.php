<?php

namespace App\Actions\Exam;

use Illuminate\Support\Facades\Http;

class ConsumeAPI
{
    public static function execute()
    {
        return Http::get('https://api.quotable.io/random')->json()['content'];
    }
}
