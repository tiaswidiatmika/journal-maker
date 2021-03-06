<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    public function employeeType()
    {
        return $this->belongsTo('App\EmployeeType');
    }

    public function entries()
    {
        return $this->belongsToMany('App\Entry');
    }
}
