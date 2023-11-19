<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Unit extends Model
{
    // $table->id();
    // $table->string('unit_name');
    // $table->unsignedBigInteger('measurement_id');

    // $table->timestamps();
    
    // $table->foreign('measurement_id')->references('id')->on('measurements');

    protected $fillable = [
        'unit_name',
        'measurement_id'
    ];
    
    use HasFactory;
}
