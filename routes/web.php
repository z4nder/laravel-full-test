<?php

use App\Http\Controllers\DailyLogController;
use Illuminate\Support\Facades\Route;


Route::middleware('auth')->group(function() {
    Route::view('/', 'dashboard')->name('dashboard');
    Route::view('/tailwind', 'tailwind')->name('tailwind');

    Route::prefix('daily-logs')->group(function () {   
      Route::post('', [DailyLogController::class, 'store'])->name('daily-logs.store');
      Route::put('{dailyLog}', [DailyLogController::class, 'update'])->name('daily-logs.update');
      Route::delete('{dailyLog}', [DailyLogController::class, 'delete'])->name('daily-logs.delete');
    });
});



