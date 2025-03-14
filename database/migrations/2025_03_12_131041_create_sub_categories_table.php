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
        Schema::create('sub_categories', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('category_id');
            // Create 'category_name' column (text, non-nullable, with latin1_swedish_ci collation)
            $table->text('name')->collation('latin1_swedish_ci');

            // Create 'category_img' column (text, non-nullable, with latin1_swedish_ci collation)
            $table->text('thumbnail')->collation('latin1_swedish_ci');

            // Create 'category_img_1' column (text, nullable, with latin1_swedish_ci collation)
            $table->text('img_1')->nullable()->collation('latin1_swedish_ci');

            // Create 'category_img_2' column (text, nullable, with latin1_swedish_ci collation)
            $table->text('img_2')->nullable()->collation('latin1_swedish_ci');

            // Create 'category_img_3' column (text, nullable, with latin1_swedish_ci collation)
            $table->text('img_3')->nullable()->collation('latin1_swedish_ci');

            // Add timestamps for created_at and updated_at columns
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sub_categories');
    }
};
