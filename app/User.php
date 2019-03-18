<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','yetki',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];


    public function yazilari() {

    return $this->hasMany('App\Yazi','user_id');


    }


    public function yetki() {

    return $this->yetki;

    }

    public function yorumlari() {

    return $this->hasMany('App\Yorum','user_id');

    }




}
