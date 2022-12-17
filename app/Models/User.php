<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens;
    use HasFactory;
    use HasProfilePhoto;
    use Notifiable;
    use TwoFactorAuthenticatable;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'role'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = [
        'profile_photo_url',
    ];

    public static function getCountUser()
    {

        return static::query()->where('created_at', '>', new Carbon('first day of last month'))->count();

    }

    public static function getIncreaseUser()
    {
        $previous = User::whereMonth('created_at', Carbon::now()->subMonth()->month)->count();
        $now = User::where('created_at', '>', new Carbon('first day of last month'))->count();
        return $now / $previous * 100;

    }

    /**
     * @return HasMany
     */
    public function courseReads()
    {
        return $this->hasMany('App\Models\CourseRead');
    }

    /**
     * @return HasMany
     */
    public function userHaveCourses()
    {
        return $this->hasMany('App\Models\UserHaveCourse');
    }
}

