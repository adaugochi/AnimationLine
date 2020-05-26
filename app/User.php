<?php

namespace App;

use App\Traits\FormatDateTrait;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

/**
 * @property mixed first_name
 * @property mixed last_name
 * @property mixed user_type_id
 */
class User extends Authenticatable
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
}
