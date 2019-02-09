<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Po_invoice extends Model
{
    
    protected $fillable = [
        'id','po_code','invoice_code','invoice_total','invoice_description','invoice_status'
    ];
}
