<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MissingVaccine extends Model
{
    use HasFactory;

    public $timestamps = true;
    protected $table = 'missing_vaccines';
    protected $fillable = [
        'userID', 'childID', 'vacID', 'missing_dose', 'phone', 'hospital_name', 'dose_fee', 'pay_by', 'takenDate', 'transaction_number', 'account_number', 'invoice_number'
    ];
}
