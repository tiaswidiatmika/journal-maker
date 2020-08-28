<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EmployeeType extends Model
{
    public function employees()
    {
        return $this->hasMany('App\Employee');
    }

    public function entries()
    {
        return $this->belongsToMany('App\Entry');
    }
}
