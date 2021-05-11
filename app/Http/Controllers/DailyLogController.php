<?php

namespace App\Http\Controllers;

use App\Http\Requests\DailyLogStoreRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

use \App\Models\DailyLog;

class DailyLogController extends Controller
{
   public function store(DailyLogStoreRequest $request)
    {
      $input = $request->validated();
    
      $request->user()->dailyLogs()->create($input);

      return back();
    }

    public function update(DailyLog $dailyLog)
    {
      $dailyLog->update(request()->only('log'));

      return back();
    }

    public function delete(DailyLog $dailyLog)
    {
      if (! Gate::allows('delete-dailyLog', $dailyLog)) abort(403);
      
      $dailyLog->delete();

      return back();
    }    
}
