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
        Schema::create('inventory_item_batch_requests', function (Blueprint $table) {
            $table->id();
            $table->string('batch_number')->default(0);
            $table->unsignedBigInteger('inventory_item_id');
            $table->decimal('stock', 10, 2); // Change 10 and 2 to your desired precision and scale

            $table->date('expiration_date');
            $table->unsignedBigInteger('category_id');
            $table->unsignedBigInteger('unit_id');
            $table->unsignedBigInteger('requested_by');

            $table->foreign('inventory_item_id')->references('id')->on('inventory_items');
            $table->foreign('category_id')->references('id')->on('categories');
            $table->foreign('unit_id')->references('id')->on('units');
            $table->foreign('requested_by')->references('id')->on('users');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('inventory_item_batch_requests');
    }
};
