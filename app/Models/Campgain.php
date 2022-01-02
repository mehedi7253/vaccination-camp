<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Campgain extends Model
{
    use HasFactory;

    protected $table = 'campgains';
    public $timestamps = true;

    protected $fillable = [
        'start_date', 'end_date', 'title', 'description', 'image', 'location'
    ];
}
