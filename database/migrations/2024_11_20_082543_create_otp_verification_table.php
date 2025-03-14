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
        Schema::create('otp_verification', function (Blueprint $table) {
            $table->id();
            $table->text('mobile')->nullable();

            // OTP column, as an integer (nullable)
            $table->integer('otp')->nullable();

            // Datetime column for the verification date
            $table->dateTime('date');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('otp_verification');
    }
};
