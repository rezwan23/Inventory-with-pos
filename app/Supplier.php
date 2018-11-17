<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    protected $fillable = [
        'name', 'email', 'phone', 'address', 'tin_number', 'type', 'company', 'address',
    ];
}
