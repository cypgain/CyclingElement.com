<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Training extends Model
{
    public $timestamps = false;

    protected $fillable = [
        'user_id',
        'name',
        'date',
        'done',
    ];

    protected $casts = [
        'date' => 'date',
    ];

}
