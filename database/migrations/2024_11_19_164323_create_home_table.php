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
        Schema::create('home', function (Blueprint $table) {
            $table->id();
            $table->text('title')->collation('utf8mb4_unicode_ci');

            // Create 'category_id' column (integer, non-nullable)
            $table->unsignedBigInteger('category_id');

         
            // Create 'is_active' column (integer, non-nullable)
            $table->integer('is_active');

            // Add foreign key constraints if needed (Assuming foreign keys to 'categories' and 'subcategories')
            // Add foreign key constraint for category_id
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
            
          
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('home');
    }
};
