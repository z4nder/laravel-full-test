<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;
use \Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\User;

class DailyLog extends Model
{
  use HasFactory;

  protected $fillable = [
    'log',
    'day',
    'user_id',
  ];

  protected $casts = [
    'day' => 'datetime',
  ];

  /**
    * Get the user who has DailyLog
  */
  public function user()
  {
    return $this->belongsTo(User::class);
  }

  /**
    * Scope a query to only include today Logs.
  */
  public function scopeFromToday(Builder $query) : Builder
  {
    return $query->whereDate('day', Carbon::today());
  }
}
