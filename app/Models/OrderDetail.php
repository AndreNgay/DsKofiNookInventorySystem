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
        'menu_item_id',
        'order_id',
        'quantity',
        'price',
        'removed',
    ];
    
    use HasFactory;
}
