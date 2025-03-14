<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categories', function (Blueprint $table) {
            // Create primary key 'id' with AUTO_INCREMENT
            $table->id();

            // Create 'category_name' column (text, non-nullable, with latin1_swedish_ci collation)
            $table->text('category_name')->collation('latin1_swedish_ci');

            // Create 'category_img' column (text, non-nullable, with latin1_swedish_ci collation)
            $table->text('category_img')->collation('latin1_swedish_ci');

            // Create 'category_img_1' column (text, nullable, with latin1_swedish_ci collation)
            $table->text('category_img_1')->nullable()->collation('latin1_swedish_ci');

            // Create 'category_img_2' column (text, nullable, with latin1_swedish_ci collation)
            $table->text('category_img_2')->nullable()->collation('latin1_swedish_ci');

            // Create 'category_img_3' column (text, nullable, with latin1_swedish_ci collation)
            $table->text('category_img_3')->nullable()->collation('latin1_swedish_ci');

            // Add timestamps for created_at and updated_at columns
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('categories');
    }
}

