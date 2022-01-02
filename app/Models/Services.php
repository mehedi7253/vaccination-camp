<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Services extends Model
{
    public $timestamps = true;
    protected $table = 'services';
    protected $fillable = [
        'userID', 'childID', 'vacID', 'dose_number', 'phone', 'address', 'dose_fee', 'pay_by', 'takenDate', 'transaction_number', 'account_number', 'invoice_number'
    ];
}
