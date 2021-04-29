<?php

namespace App;

use App\Notifications\AdminResetPasswordNotification;
use App\Traits\FormatDateTrait;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

/**
 * @property mixed first_name
 * @property mixed last_name
 * @property mixed user_type_id
 */
class Admin extends Authenticatable
{
    use Notifiable, FormatDateTrait;

    protected $guard = 'admin';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name', 'last_name', 'email', 'password', 'job_title'
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
     * Send the password reset notification.
     *
     * @param string $token
     * @return void
     */
    public function sendPasswordResetNotification($token)
    {
        $this->notify(new AdminResetPasswordNotification($token));
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     * @author Maryfaith Mgbede <adaamgbede@gmail.com>
     */
    public function posts()
    {
        return $this->hasMany(Blog::class);
    }
}
