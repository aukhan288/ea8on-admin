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
        Schema::create('ingredients', function (Blueprint $table) {
            $table->id();
            $table->foreignId('product_id')->constrained('products'); // Links to the products table
            $table->string('name'); // Name of the ingredient (e.g., Chicken Breast, Lettuce)
            $table->decimal('quantity', 8, 2); // Amount/Weight/Quantity used (e.g., 200 grams)
            $table->string('unit'); // Unit of measurement (e.g., grams, pieces, tablespoons)
            $table->decimal('price', 8, 2); // Price of the ingredient (e.g., 5.50 for the cost of 200 grams)
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ingredients');
    }
};
