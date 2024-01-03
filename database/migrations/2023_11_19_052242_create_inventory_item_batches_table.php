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
        Schema::create('inventory_item_batches', function (Blueprint $table) {
            $table->id();
            $table->decimal('stock', 10, 2)->nullable()->default(0);
            $table->date('expiration_date');
            $table->unsignedBigInteger('inventory_item_id');
            $table->unsignedBigInteger('category_id');
            $table->unsignedBigInteger('unit_id');

            $table->foreign('inventory_item_id')->references('id')->on('inventory_items');
            $table->foreign('category_id')->references('id')->on('categories');
            $table->foreign('unit_id')->references('id')->on('units');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('inventory_item_batches');
    }
};
