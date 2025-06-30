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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('description')->nullable();
            $table->decimal('price', 10, 2);
            $table->string('image')->nullable();
            $table->unsignedInteger('stock')->default(0); // Stock quantity
            $table->enum('category', [
                'Groceries',
                'Dairy & Eggs',
                'Bakery & Snacks',
                'Beverages',
                'Household Essentials',
                'Personal Care',
                'Health & Wellness',
                'Meat & Seafood',
                'Frozen Foods',
                'Baby Care',
                'Others',
            ]);  // Category of the product
            $table->string('brand')->nullable();
            $table->string('country_of_origin')->nullable();
            $table->string('barcode')->nullable();
            $table->date('expiry_date'); // Expiry date for perishable items
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
