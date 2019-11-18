<?php

namespace App\Models;

use Laravel\Passport\HasApiTokens;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasApiTokens, Notifiable;

    const ROLE_USER = 1;
    const ROLE_PREMIUM_USER = 2;
    const ROLE_MODERATOR = 3;
    const ROLE_ADMINISTRATOR = 4;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
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

    public function role()
    {
        return $this->belongsTo('App\Models\Role', 'role_id', 'id');
    }

    public function isAdmin(): bool
    {
        return $this->role->id === self::ROLE_ADMINISTRATOR;
    }

    public function isModerator(): bool
    {
        return $this->role->id === self::ROLE_MODERATOR;
    }

    public function isPremium(): bool
    {
        return $this->role->id === self::ROLE_PREMIUM_USER;
    }

    public function isUser(): bool
    {
        return $this->role->id === self::ROLE_USER;
    }
}
