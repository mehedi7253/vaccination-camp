<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Child_registration extends Model
{
    use HasFactory;
    public $timestamps = true;

    protected $table = 'child_registrations';

    protected $fillable = [
      'user_id', 'first_name', 'last_name', 'birth_date', 'birth_certificate'
    ];
}
