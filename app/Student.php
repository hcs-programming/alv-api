<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $guarded = ['id'];
    public function entries()
    {
        return $this->hasMany('App\Entry');
    }

    public function entry()
    {
        return $this->hasOne('App\Entry');
    }
}
