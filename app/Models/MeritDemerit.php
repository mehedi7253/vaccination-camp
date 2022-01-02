<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MeritDemerit extends Model
{
    use HasFactory;

    protected $table = 'merit_demerits';

    public $timestamps = true;

    protected $fillable = [
      'vaccine_id', 'merit_demerit', 'description'
    ];
}
