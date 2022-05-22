<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticable;
use Illuminate\Notifications\Notifiable;

class Customer extends Authenticable
{
    use Notifiable;

    protected $guard = 'customer';

    protected $fillable = [
        'name', 'email', 'password','email_verfied_at',
    ];

    protected $hidden = ['password'];

    public function setPasswordAttribute($value)
	{
    $this->attributes['password'] = bcrypt($value);
	}
}