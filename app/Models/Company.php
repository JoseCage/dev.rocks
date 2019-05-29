<?php

namespace DevRocks\Models;

// use Illuminate\Database\Eloquent\Model;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

use DevRocks\Traits\UuidTrait as Uuids;

class Company extends Authenticatable
{
    use Uuids, Notifiable;

    protected $guard = 'companies';

    /**
     * Indicates if the IDs are auto-incrementing.
     *
     * @var bool
     */
    public $incrementing = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id','name', 'email', 'email_verified_at',
        'phone', 'logo','facebook_handle', 'website',
        'twitter_handle', 'github_handle', 'slug', 'password'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'deleted_at', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function jobs()
    {
        return $this->hasMany(Job::class);
    }
}
