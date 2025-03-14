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
        Schema::create('feedback', function (Blueprint $table) {
            $table->id();
            $table->text('order_id')->nullable()->collation('latin1_swedish_ci');

            // Create 'user_id' column (integer, non-nullable)
            $table->unsignedBigInteger('user_id');

            // Create 'rate' column (text, non-nullable, with latin1_swedish_ci collation)
            $table->text('rate')->collation('latin1_swedish_ci');

            // Create 'message' column (text, nullable, with latin1_swedish_ci collation)
            $table->text('message')->nullable()->collation('latin1_swedish_ci');

            // Add foreign key constraints
            // Assuming 'user_id' references the 'users' table
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('feedback');
    }
};
