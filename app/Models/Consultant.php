<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Consultant extends Model
{
    use HasFactory;
    protected $table = 'consultants';
    public $timestamps = true;

    protected $fillable = [
        'name', 'email', 'phone', 'designation', 'current_job', 'image', 'price'
    ];
}
