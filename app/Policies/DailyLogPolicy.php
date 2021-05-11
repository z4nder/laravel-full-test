<?php

namespace App\Policies;

use App\Models\DailyLog;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class DailyLogPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can delete the DailyLog.
    */
    public function delete(User $user, DailyLog $dailyLog) : mixed
    {
       return $user->id === $dailyLog->user_id;
    }
}
