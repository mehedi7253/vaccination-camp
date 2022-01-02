<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vaccine extends Model
{
    use HasFactory;
    public $timestamps = true;
    protected $table = 'vaccines';

    protected $fillable = [
        'vaccine_name', 'number_of_dose', 'disease', 'age_limit', 'description', 'break', 'vaccine_image'
    ];

}
