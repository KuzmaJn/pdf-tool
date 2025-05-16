<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class History extends Model

{
    protected $table = 'history';

    protected $fillable = [
        'user_id',
        'service_id',
        'interface',
        'used_at',
        'location',
    ];

    protected $casts = [
        'used_at' => 'datetime',
    ];

}
