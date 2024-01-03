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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            
            $table->string('username');
            $table->string('password');
            $table->string('role')->default('employee');

            $table->string('name')->nullable();
            
            $table->string('house_number')->nullable();
            $table->string('street')->nullable();
            $table->string('barangay')->nullable();
            $table->string('city')->nullable();
            $table->string('province')->nullable();

            $table->string('email')->unique()->nullable();
            $table->string('contact_number')->nullable();
            $table->string('emergency_contact_name')->nullable();
            $table->string('emergency_contact_relation')->nullable();
            $table->string('emergency_contact_number')->nullable();
            $table->boolean('archived')->default(false);
            $table->boolean('profile_made')->default(false);

            //remember token
            $table->string('remember_token')->nullable();
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
