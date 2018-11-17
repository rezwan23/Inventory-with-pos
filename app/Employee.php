<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    protected $fillable = [
        'name',
        'email',
        'phone',
        'designation',
        'nid',
        'present_address',
        'permanent_address',
    ];
}
