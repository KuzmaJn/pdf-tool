<?php

namespace App\Models;

//use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;
//    use HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'email',
        'password',
        'is_admin',
    ];

    protected $hidden = [
        'password',
        'remember_token',
        'is_admin',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
        'is_admin' => 'boolean',
    ];
}

//
//namespace App\Models;
//
//use Illuminate\Database\Eloquent\Model;
//
//class User extends Model
//{
//    protected $primaryKey = 'user_id';
//
//    protected $fillable = [
//        'name',
//        'hashed_pass',
//        'api_key',
//        'is_admin',
//    ];
//
//    protected $hidden = ['hashed_pass'];
//}
