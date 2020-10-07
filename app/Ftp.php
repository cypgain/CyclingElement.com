<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ftp extends Model
{

    public $timestamps = false;

    protected $fillable = [
        'user_id',
        'created_at',
        'ftp',
    ];

    protected $casts = [
        'created_at' => 'datetime',
    ];

}
