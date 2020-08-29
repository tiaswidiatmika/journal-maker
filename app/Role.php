<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    // role - employee relation
    // this has many to many
    public function employees()
    {
        $this->belongsToMany('App\Employee');
    }
}
