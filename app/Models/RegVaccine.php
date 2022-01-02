<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RegVaccine extends Model
{
    use HasFactory;
    protected $table = 'reg_vaccines';

    public $timestamps = true;
    protected $fillable = [
      'child_id', 'user_id','vaccine_id', 'dose_taken', 'taken_date', 'status'
    ];
}
