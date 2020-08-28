<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    public function employeeTypes()
    {
        return $this->belongsTo('App\EmployeeType');
    }

    public function entries()
    {
        return $this->hasMany('App\Entry');
    }
}
