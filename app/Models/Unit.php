<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Unit extends Model
{
    // $table->id();
    // $table->unsignedBigInteger('category_id');
    // $table->string('unit_name');
    // $table->string('unit_symbol');
    // $table->string('unit_conversion');
    // $table->timestamps();

    // $table->foreign('category_id')->references('id')->on('categories');

    protected $fillable = [
        'category_id',
        'unit_name',
        'unit_symbol',
        'unit_conversion',
    ];
    
    use HasFactory;
}
