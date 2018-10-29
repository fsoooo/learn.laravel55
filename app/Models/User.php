<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    protected $table = 'true_user_info';

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

    public function getMyMessage()
    {
        return $this->hasMany('App\Models\MessageRule', 'rid', 'id');
    }

    //真实信息
    public function trueUserInfo()
    {
        return $this->hasOne('App\Models\TrueUserInfo', 'user_id', 'id');
    }
}
