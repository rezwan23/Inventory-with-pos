<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    protected $fillable = [
        'invoice_no', 'from', 'to', 'invoice_type', 'total_amount', 'amount_paid', 'amount_due', 'status'
    ];
}
