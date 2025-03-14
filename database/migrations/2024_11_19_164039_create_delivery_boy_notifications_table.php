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
        Schema::create('delivery_boy_notifications', function (Blueprint $table) {
            $table->id();

            // 'delivery_boy_id' column (integer, non-nullable)
            $table->unsignedBigInteger('delivery_boy_id');

            // 'title' column (text, nullable, with utf8mb3_unicode_ci collation)
            $table->text('title')->nullable()->collation('utf8mb3_unicode_ci');

            // 'description' column (text, nullable, with utf8mb3_unicode_ci collation)
            $table->text('description')->nullable()->collation('utf8mb3_unicode_ci');

            // 'created_at' column (timestamp, non-nullable, automatically managed by Laravel)
            $table->timestamps(); // Automatically creates 'created_at' and 'updated_at' columns

            // Add foreign key constraint for 'delivery_boy_id' referencing the 'delivery_boys' table
            $table->foreign('delivery_boy_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('delivery_boy_notifications');
    }
};
