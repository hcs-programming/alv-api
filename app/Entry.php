<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Entry extends Model
{
    protected $guarded = ['id'];
    protected $casts = [
        'lunch' => 'boolean',
        'beard' => 'boolean',
        'belt' => 'boolean',
        'shoes' => 'boolean',
        'uniform' => 'boolean',
    ];
}
