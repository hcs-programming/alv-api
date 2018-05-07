<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Day extends Model
{
    protected $guarded = ['id'];

    public function entries()
    {
        return $this->hasMany('App\Entry');
    }
}
