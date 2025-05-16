<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    protected $primaryKey = 'user_id';

    protected $fillable = [
        'name',
        'hashed_pass',
        'api_key',
        'is_admin',
    ];

    protected $hidden = ['hashed_pass'];
}
