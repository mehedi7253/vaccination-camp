<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CoronaVaccine extends Model
{
    use HasFactory;
    protected $table = 'corona_vaccine';
    public $timestamps = true;

    protected $fillable = [
      'vaccine_name', 'number_of_dose', 'image', 'break', 'dises_name', 'description'
    ];
}
