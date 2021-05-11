<?php

namespace App\Http\Controllers;

use App\Http\Requests\DailyLogStoreRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Events\DailyLogCreated;

use \App\Models\DailyLog;

class DailyLogController extends Controller
{
    function __construct()
    {
      $this->middleware('user.block.name', ['only' => ['store']]);
    }

   public function store(DailyLogStoreRequest $request)
    {
      $input = $request->validated();
    
      $dailyLog = $request->user()->dailyLogs()->create($input);

      event(new DailyLogCreated($dailyLog));

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
