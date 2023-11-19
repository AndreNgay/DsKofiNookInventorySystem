<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('menu_item_ingredients', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('inventory_item_id');
            $table->unsignedBigInteger('menu_item_id');
            $table->integer('amount');
            $table->unsignedBigInteger('measurement');
            $table->unsignedBigInteger('unit');

            $table->timestamps();
            $table->foreign('inventory_item_id')->references('id')->on('inventory_items')->onUpdate('cascade')->onDelete('restrict');
            $table->foreign('menu_item_id')->references('id')->on('menu_items')->onUpdate('cascade')->onDelete('restrict');
            $table->foreign('measurement')->references('id')->on('measurements')->onUpdate('cascade')->onDelete('restrict');
            $table->foreign('unit')->references('id')->on('units')->onUpdate('cascade')->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('menu_item_ingredients');
    }
};
