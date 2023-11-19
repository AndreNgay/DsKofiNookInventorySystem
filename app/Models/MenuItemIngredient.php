<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MenuItemIngredient extends Model
{
    // $table->id();
    // $table->unsignedBigInteger('inventory_item_id');
    // $table->unsignedBigInteger('menu_item_id');
    // $table->integer('amount');
    // $table->unsignedBigInteger('measurement');
    // $table->unsignedBigInteger('unit');

    // $table->timestamps();
    // $table->foreign('inventory_item_id')->references('id')->on('inventory_items')->onUpdate('cascade')->onDelete('restrict');
    // $table->foreign('menu_item_id')->references('id')->on('menu_items')->onUpdate('cascade')->onDelete('restrict');
    // $table->foreign('measurement')->references('id')->on('measurements')->onUpdate('cascade')->onDelete('restrict');
    // $table->foreign('unit')->references('id')->on('units')->onUpdate('cascade')->onDelete('restrict');

    protected $fillable = [
        'inventory_item_id',
        'menu_item_id',
        'amount',
        'measurement',
        'unit'
    ];
    
    use HasFactory;
}
