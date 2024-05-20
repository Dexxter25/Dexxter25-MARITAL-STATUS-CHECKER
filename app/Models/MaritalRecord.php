<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MaritalRecord extends Model
{
    use HasFactory;

    protected $fillable = [
        'first_name',
        'middle_name',
        'last_name',
        'gender',
        'birthdate',
        'civil_status',
        'religion',
        'phone_number',
        'address',
        'mother_name',
        'father_name',
        'citizenship',
        'nationality',
    ];
}
