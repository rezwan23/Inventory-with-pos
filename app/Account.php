<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Account extends Model
{
    protected $fillable =  [
        'name', 'type', 'acc_no', 'bank_name', 'opening_balance', 'bank_address', 'balance'
    ];
}
