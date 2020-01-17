<?php

namespace App\Http\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Notifications\CustomResetPassword;

/**
 * App\Http\Models\User
 *
 * @property int $id
 * @property string $nickname
 * @property string $email
 * @property string $password
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection|\Illuminate\Notifications\DatabaseNotification[] $notifications
 * @property-read int|null $notifications_count
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Http\Models\User newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Http\Models\User newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Http\Models\User query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Http\Models\User whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Http\Models\User whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Http\Models\User whereNickname($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Http\Models\User wherePassword($value)
 * @mixin \Eloquent
 * @property string $name
 * @property string|null $email_verified_at
 * @property string|null $remember_token
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Http\Models\User whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Http\Models\User whereEmailVerifiedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Http\Models\User whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Http\Models\User whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Http\Models\User whereUpdatedAt($value)
 */
class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $guarded = [
        'id',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
//        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
//        'email_verified_at' => 'datetime',
    ];

    /**
     * パスワード再設定メールの送信
     *
     * @param  string  $token
     * @return void
     */
    public function sendPasswordResetNotification($token)
    {
        $this->notify(new CustomResetPassword($token));
    }
}
