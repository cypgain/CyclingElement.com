<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{

    public $table = 'activities';
    public $timestamps = false;

    protected $fillable = [
        'id',
        'strava_id',
        'user_id',
        'name',
        'type',
        'distance',
        'moving_time',
        'elapsed_time',
        'elevation',
        'start_date',
        'average_speed',
        'max_speed',
        'average_watts',
        'max_watts',
        'calories',
        'average_cadence',
        'average_heartrate',
        'max_heartrate',
    ];

    protected $casts = [
        'start_date' => 'datetime',
    ];

}
