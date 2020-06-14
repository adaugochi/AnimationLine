<?php

namespace App;

use App\Notifications\UserResetPasswordNotification;
use App\Notifications\UserVerifyEmailNotification;
use App\Traits\FormatDateTrait;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

/**
 * @property mixed first_name
 * @property mixed last_name
 * @property mixed user_type_id
 */
class User extends Authenticatable implements MustVerifyEmail
{
    use Notifiable, FormatDateTrait;

    const ADMIN = 1;
    const CLIENT = 2;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name', 'last_name', 'email', 'password'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     * @author Maryfaith Mgbede <adaamgbede@gmail.com>
     */
    public function payments()
    {
        return $this->hasMany(Billing::class);
    }
    
    /**
     * Send the password reset notification.
     * @param string $token
     * @return void
     */
    public function sendPasswordResetNotification($token)
    {
        $this->notify(new UserResetPasswordNotification($token));
    }

    public function sendEmailVerificationNotification()
    {
        $this->notify(new UserVerifyEmailNotification());
    }
}
