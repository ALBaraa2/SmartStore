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
        Schema::create('delivery_personnel', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onDelete('restrict');
            $table->string('name'); // Name of the delivery personnel
            $table->unsignedInteger('number_of_orders')->default(0); // Number of orders assigned to the delivery personnel
            $table->enum('status', ['available', 'unavailable'])->default('available');
            $table->unsignedInteger('rate')->default(0.00); // Rate for the delivery personnel
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('delivery_personnel');
    }
};
