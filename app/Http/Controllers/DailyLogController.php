<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DailyLogController extends Controller
{
    public function update($id)
    {
        $log = \App\Models\DailyLog::findOrFail($id);

        $log->update(request()->only('log'));

        return back();
    }
}
