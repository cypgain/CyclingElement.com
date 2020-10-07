<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Weight extends Model
{

    public $timestamps = false;

    protected $fillable = [
        'user_id',
        'created_at',
        'weight',
    ];

    protected $casts = [
        'created_at' => 'datetime',
    ];

}
