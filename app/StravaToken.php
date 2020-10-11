<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StravaToken extends Model
{

    public $table = 'users_strava_tokens';
    public $timestamps = false;

    protected $fillable = [
        'user_id',
        'strava_id',
        'access_token',
        'refresh_token',
        'expires_at',
    ];

    protected $casts = [
        'expire_at' => 'datetime',
    ];

}
