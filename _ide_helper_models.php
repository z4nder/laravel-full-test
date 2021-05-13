<?php

// @formatter:off
/**
 * A helper file for your Eloquent Models
 * Copy the phpDocs from this file to the correct Model,
 * And remove them from this file, to prevent double declarations.
 *
 * @author Barry vd. Heuvel <barryvdh@gmail.com>
 */


namespace App\Models{
/**
 * App\Models\DailyLog
 *
 * @property int $id
 * @property int $user_id
 * @property string $log
 * @property \Illuminate\Support\Carbon $day
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\User $user
 * @method static \Database\Factories\DailyLogFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|DailyLog fromToday()
 * @method static \Illuminate\Database\Eloquent\Builder|DailyLog newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|DailyLog newQuery()
 * @method static \Illuminate\Database\Query\Builder|DailyLog onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|DailyLog query()
 * @method static \Illuminate\Database\Eloquent\Builder|DailyLog whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DailyLog whereDay($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DailyLog whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DailyLog whereLog($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DailyLog whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DailyLog whereUserId($value)
 * @method static \Illuminate\Database\Query\Builder|DailyLog withTrashed()
 * @method static \Illuminate\Database\Query\Builder|DailyLog withoutTrashed()
 */
	class DailyLog extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\User
 *
 * @property int $id
 * @property string $name
 * @property string $email
 * @property Carbon|null $email_verified_at
 * @property string $password
 * @property string|null $remember_token
 * @property int|null $current_team_id
 * @property string|null $profile_photo_path
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string|null $two_factor_secret
 * @property string|null $two_factor_recovery_codes
 * @property-read string $profile_photo_url
 * @property-read DatabaseNotificationCollection|DatabaseNotification[] $notifications
 * @property-read int|null $notifications_count
 * @property-read Collection|PersonalAccessToken[] $tokens
 * @property-read int|null $tokens_count
 * @method static Builder|User newModelQuery()
 * @method static Builder|User newQuery()
 * @method static Builder|User query()
 * @method static Builder|User whereCreatedAt($value)
 * @method static Builder|User whereCurrentTeamId($value)
 * @method static Builder|User whereEmail($value)
 * @method static Builder|User whereEmailVerifiedAt($value)
 * @method static Builder|User whereId($value)
 * @method static Builder|User whereName($value)
 * @method static Builder|User wherePassword($value)
 * @method static Builder|User whereProfilePhotoPath($value)
 * @method static Builder|User whereRememberToken($value)
 * @method static Builder|User whereTwoFactorRecoveryCodes($value)
 * @method static Builder|User whereTwoFactorSecret($value)
 * @method static Builder|User whereUpdatedAt($value)
 * @mixin Eloquent
 * @property-read \Illuminate\Database\Eloquent\Collection|\OwenIt\Auditing\Models\Audit[] $audits
 * @property-read int|null $audits_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\DailyLog[] $dailyLogs
 * @property-read int|null $daily_logs_count
 * @method static \Database\Factories\UserFactory factory(...$parameters)
 */
	class User extends \Eloquent implements \OwenIt\Auditing\Contracts\Auditable {}
}

