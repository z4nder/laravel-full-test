<?php

use App\Http\Controllers\DailyLogController;
use Illuminate\Support\Facades\Route;


Route::middleware('auth')->group(function() {
    Route::view('/', 'dashboard')->name('dashboard');
    Route::view('/tailwind', 'tailwind')->name('tailwind');

    Route::put('daily-logs/{id}', [DailyLogController::class, 'update'])->name('daily-logs.update');
});



