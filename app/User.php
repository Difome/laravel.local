<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'username', 
        'name', 
        'email', 
        'password', 
        'country_id', 
        'region_id', 
        'city_id', 
        'biography',
        'banned_until',
        'last_login_at',
        'last_login_ip',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $dates = [
        'banned_until',
    ];


    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function country()
    {
      return $this->hasOne('App\Country', 'code', 'country_id');
    }

    public function region()
    {
      return $this->hasOne('App\Region', 'region', 'region_id');
    }

    public function city()
    {
      return $this->hasOne('App\City', 'id', 'city_id');
    }

    public function posts()
    {
      return $this->hasMany('App\Post');
    }

    public function followers()
    {
      return $this->hasMany('App\Follower');
    }

    public function followings()
    {
      return $this->hasMany('App\Follower', 'follower_id');
    }

    public function photos()
    {
      return $this->hasMany('App\Photo', 'user_id')->orderByDesc('id');
    }

}
