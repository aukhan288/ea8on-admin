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
        Schema::create('product_enquiry', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id')->nullable();

            // Text column for the message (nullable)
            $table->text('message')->nullable();

            // Datetime column for the enquiry date
            $table->dateTime('date');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('product_enquiry');
    }
};
