<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CoronaReg extends Model
{
    use HasFactory;
    protected $table = 'corona_regs';

    public $timestamps = true;

    protected $fillable = [
        'userID', 'fullName', 'phone', 'nid', 'bod', 'hospital', 'address', 'takenDate', 'dosetaken','status', 'vacID'
    ];
}
