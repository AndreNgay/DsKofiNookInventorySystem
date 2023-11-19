<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    // $table->id();
    // $table->string('total_price');
    
    // $table->timestamps();
    // $table->unsignedBigInteger('taken_by');

    // $table->foreign('taken_by')->references('id')->on('users');

    protected $fillable = [
        'total_price',
        'taken_by',
    ];
    
    use HasFactory;
}
