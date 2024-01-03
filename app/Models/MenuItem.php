<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MenuItem extends Model
{
    // $table->id();
    // $table->string('item_name');
    // $table->string('price');

    // $table->timestamps();
    protected $fillable = [
        'item_name',
        'price',
        'amount_of_times_bought',
    ];
    use HasFactory;
}
