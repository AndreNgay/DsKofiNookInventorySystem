<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    // $table->id();
    // $table->string('category_name');
    // $table->string('description')->nullable();

    // $table->timestamps();
    protected $fillable = [
        'category_name',
        'description'
    ];

}
