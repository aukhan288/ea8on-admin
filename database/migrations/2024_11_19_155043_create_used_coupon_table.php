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
        Schema::create('used_coupon', function (Blueprint $table) {
            $table->id(); // This will create an 'id' column as an AUTO_INCREMENT primary key

            // 'coupon_id' column (nullable)
            $table->unsignedBigInteger('coupon_id')->nullable();

            // 'user_id' column (nullable)
            $table->unsignedBigInteger('user_id')->nullable();

            // 'date' column (nullable datetime)
            $table->datetime('date')->nullable();

            // Add foreign key constraint for 'coupon_id' (optional, if you have a coupons table)
            $table->foreign('coupon_id')->references('id')->on('coupons')->onDelete('set null');

            // Add foreign key constraint for 'user_id' (optional, if you have a users table)
            $table->foreign('user_id')->references('id')->on('users')->onDelete('set null');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('used_coupon');
    }
};
