<?php

namespace App\Models;


use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;
    protected $fillable = [
        'first_name',
        'last_name',
        'name',
        'username',
        'image',
        'email',
        'email_verified',
        'otp',
        'otp_requested_at',
        'user_token',
        'first_welcome',
        'email_verified_at',
        'password',
        'role',
        'status',
    ];
}
