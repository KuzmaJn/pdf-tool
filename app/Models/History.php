<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;


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

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public static function record($service_id, $location, $interface) {
        return self::create([
            'user_id'    => auth()->id(),
            'service_id' => $service_id,
            'interface'  => $interface,
            'used_at'    => now(),
            'location'   => $location,
        ]);
    }

    public static function resolveLocation($request) {
        $ip = $request->ip();
        $location = null;
        try {
            $response = Http::get("http://ip-api.com/json/{$ip}");
            $city = $response['city'] ?? null;
            $country = $response['country'] ?? null;
            if ($country || $city) {
                $location = ($country ?? '') . ', ' . ($city ?? '');
            } else {
                $location = 'intrak';
            }
        } catch (\Exception $e) {
            \Illuminate\Support\Facades\Log::error('Error fetching IP info: ' . $e->getMessage());
        }
        return $location;
    }
}
