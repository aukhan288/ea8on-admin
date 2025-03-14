<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            // Create primary key 'id' with AUTO_INCREMENT
            $table->id();

            // Create 'product_name' column (text, non-nullable, with latin1_swedish_ci collation)
            $table->text('product_name')->collation('latin1_swedish_ci');

            // Create 'brand_name' column (text, non-nullable, with latin1_swedish_ci collation)
            $table->text('brand_name')->collation('latin1_swedish_ci');

            // Create 'category_id' column (foreign key to 'categories' table)
            $table->unsignedBigInteger('category_id');

            // Create 'description' column (text, non-nullable, with latin1_swedish_ci collation)
            $table->text('description')->collation('latin1_swedish_ci');

            // Create 'variation' column (text, non-nullable, with latin1_swedish_ci collation)
            $table->text('variation')->collation('latin1_swedish_ci');

            // Create 'price' column (text, non-nullable, with latin1_swedish_ci collation)
            $table->text('price')->collation('latin1_swedish_ci');

            // Create 'status' column (integer, non-nullable)
            $table->integer('status');

            // Create 'stock' column (integer, non-nullable)
            $table->integer('stock');

            // Create 'main_img' column (text, non-nullable, with latin1_swedish_ci collation)
            $table->text('main_img')->collation('latin1_swedish_ci');

            // Create 'img_1', 'img_2', 'img_3' columns (nullable, with latin1_swedish_ci collation)
            $table->text('img_1')->nullable()->collation('latin1_swedish_ci');
            $table->text('img_2')->nullable()->collation('latin1_swedish_ci');
            $table->text('img_3')->nullable()->collation('latin1_swedish_ci');

            // Create 'tag' column (longtext, nullable, with latin1_swedish_ci collation)
            $table->longText('tag')->nullable()->collation('latin1_swedish_ci');

            // Create 'date' column (datetime, non-nullable)
            $table->datetime('date');

            // Create 'discount' column (integer, non-nullable, default value 0)
            $table->integer('discount')->default(0);

            // Create 'popular' column (integer, non-nullable)
            $table->integer('popular');

            // Create 'dealOfTheDay' column (integer, non-nullable, default value 0)
            $table->integer('dealOfTheDay')->default(0);

            // Create 'is_delete' column (integer, nullable)
            $table->integer('is_delete')->nullable();

            // Add foreign key constraints
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');

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
        Schema::dropIfExists('products');
    }
}


