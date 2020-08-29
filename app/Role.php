<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    public function employeeTypes()
    {
        $this->belongsToMany('App\EmployeeType');
    }

    // role - entries relation
    // this has one to many

    public function entries()
    {
        $this->hasMany('App\Entry');
    }
}
