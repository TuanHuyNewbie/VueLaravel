<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;

class admin extends Authenticatable
{
    use HasApiTokens, Notifiable;

    protected $fillable = [
        'name', 'password'
    ];

    protected $hidden = [
        'password',
    ];
}
