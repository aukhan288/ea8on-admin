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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->text('user_order_id')->nullable();
            $table->text('user_id')->nullable();
            $table->text('product_name')->nullable();
            $table->text('product_id')->nullable();
            $table->text('product_variation')->nullable();
            $table->text('product_price')->nullable();
            $table->text('delivery_date')->nullable();
            $table->text('timeslot')->nullable();
            $table->text('discount')->nullable();
            $table->text('total')->nullable();
            $table->text('payment_method_id')->nullable();
            $table->text('photo')->nullable();
            $table->text('delivery_boy_status')->nullable();
            $table->text('tax')->nullable();
            $table->text('transaction_id')->nullable();
            $table->text('coupon_amount')->nullable();
            $table->text('deliveryCharge')->nullable();
            $table->text('totalDiscountPrice')->nullable();
            $table->text('serviceTaxAmt')->nullable();

            // Integer columns
            $table->integer('status')->default(1)->nullable();
            $table->integer('delivery_boy_id')->default(0)->nullable();
            $table->integer('address_id')->default(0)->nullable();
            $table->integer('coupon_id')->nullable();
            $table->integer('used_wallet_amount')->default(0)->nullable();

            // DateTime column
            $table->dateTime('order_date')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
