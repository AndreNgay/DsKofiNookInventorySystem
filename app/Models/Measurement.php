<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Measurement extends Model
{
    protected $fillable = [
        'measurement_name',
        'description'
    ];

    use HasFactory;
}
