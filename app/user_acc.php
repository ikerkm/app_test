<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;
use Laravel\Passport\HasApiTokens;
class user_acc extends Model
{
    use HasApiTokens, Notifiable;
    protected $fillable = ['name','password','email'];



    protected $hidden = [
        'password','remember_token',
    ];

    
}
