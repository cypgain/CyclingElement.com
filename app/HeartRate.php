<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HeartRate extends Model
{

    public $table = 'heart_rates';
    public $timestamps = false;

    protected $fillable = [
        'user_id',
        'created_at',
        'heart_rate',
    ];

    protected $casts = [
        'created_at' => 'datetime',
    ];

}
