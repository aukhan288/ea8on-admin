<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSidesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sides', function (Blueprint $table) {
            $table->id();  // Auto-incrementing primary key
            $table->string('name');  // Name of the side (e.g., "Left", "Right")
            $table->text('description')->nullable();  // Optional description of the side
            $table->string('image')->nullable();  // Image field for storing the path of the uploaded image
            $table->decimal('price', 8, 2);  // Price field with 8 digits total and 2 decimals
            $table->integer('status')->default(1);  // Status field (1 for active, 0 for inactive)
            $table->timestamps();  // Created_at and updated_at timestamps
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sides');
    }
}
