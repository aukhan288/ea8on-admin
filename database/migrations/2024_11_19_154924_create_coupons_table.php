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
        Schema::create('coupons', function (Blueprint $table) {
            $table->id(); // 'id' will be AUTO_INCREMENT PRIMARY KEY by default

            // 'user_id' column (nullable, 0 for all users, other values for specific users)
            $table->unsignedBigInteger('user_id')->nullable()->default(0);

            // 'coupon_img' column (text, non-nullable, with utf8mb4_unicode_ci collation)
            $table->text('coupon_img')->collation('utf8mb4_unicode_ci');

            // 'is_multitimes' column (integer, non-nullable, default value is 0, single use = 0, multi-use = 1)
            $table->integer('is_multitimes')->default(0);

            // 'date' column (date, non-nullable)
            $table->date('date');

            // 'description' column (text, non-nullable, with utf8mb4_unicode_ci collation)
            $table->text('description')->collation('utf8mb4_unicode_ci');

            // 'value' column (text, non-nullable, with utf8mb4_unicode_ci collation)
            $table->text('value')->collation('utf8mb4_unicode_ci');

            // 'coupon_code' column (text, non-nullable, with utf8mb4_unicode_ci collation)
            $table->text('coupon_code')->collation('utf8mb4_unicode_ci');

            // 'status' column (integer, non-nullable, default value is 1)
            $table->integer('status')->default(1);

            // 'coupon_title' column (text, non-nullable, with utf8mb4_unicode_ci collation)
            $table->text('coupon_title')->collation('utf8mb4_unicode_ci');

            // 'min_order_amount' column (integer, non-nullable)
            $table->integer('min_order_amount');

            // 'is_delete' column (integer, nullable)
            $table->integer('is_delete')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('coupons');
    }
};
