<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;
    protected $table = 'bookings';
    public $timestamps = true;

    protected $fillable = [
        'userID', 'doctorID', 'transaction_number', 'account_number', 'invoice_number','amount', 'payment_by', 'fullname', 'status'
    ];
}
