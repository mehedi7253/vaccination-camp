<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hospital extends Model
{
    use HasFactory;
    protected $table = 'hospitals';

    public $timestamps = true;

    protected $fillable = [
        'hospital_name', 'address', 'map_link', 'phone', 'description'
    ];
}
