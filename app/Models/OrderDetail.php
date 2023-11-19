<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
    // $table->id();

    // $table->unsignedBigInteger('order_number');
    // $table->unsignedBigInteger('menu_item_id');
    
    // $table->timestamps();

    // $table->foreign('order_number')->references('id')->on('orders');
    // $table->foreign('menu_item_id')->references('id')->on('menu_items');

    protected $fillable = [
        'order_number',
        'menu_item_id',
    ];
    
    use HasFactory;
}
