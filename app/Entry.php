<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Entry extends Model
{
    public function employees()
    {
        return $this->belongsToMany('App\Employee');
    }

    public function employeeTypes()
    {
        return $this->belongsToMany('App\EmployeeType');
    }
}
