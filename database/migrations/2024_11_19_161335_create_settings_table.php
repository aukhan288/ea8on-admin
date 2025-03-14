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
        Schema::create('settings', function (Blueprint $table) {
            $table->id();
            $table->longText('privacy_policy')->collation('latin1_swedish_ci');

            // 'about_us' column (longtext, non-nullable, latin1_swedish_ci collation)
            $table->longText('about_us')->collation('latin1_swedish_ci');

            // 'minimum_order_value' column (integer, non-nullable)
            $table->integer('minimum_order_value');

            // 'timezone' column (text, non-nullable, latin1_swedish_ci collation)
            $table->text('timezone')->collation('latin1_swedish_ci');

            // 'tax' column (integer, non-nullable)
            $table->integer('tax');

            // 'app_header_logo' column (nullable text, utf8mb3_general_ci collation)
            $table->text('app_header_logo')->nullable()->collation('utf8mb3_general_ci');

            // 'app_logo' column (nullable text, latin1_swedish_ci collation)
            $table->text('app_logo')->nullable()->collation('latin1_swedish_ci');

            // 'title' column (nullable text, latin1_swedish_ci collation)
            $table->text('title')->nullable()->collation('latin1_swedish_ci');

            // 'terms_condition' column (text, non-nullable, latin1_swedish_ci collation)
            $table->text('terms_condition')->collation('latin1_swedish_ci');

            // 'refund_policy' column (nullable text, latin1_swedish_ci collation)
            $table->text('refund_policy')->nullable()->collation('latin1_swedish_ci');

            // 'currency' column (nullable text, latin1_swedish_ci collation)
            $table->text('currency')->nullable()->collation('latin1_swedish_ci');

            // 'notification_secret_key' column (nullable text, latin1_swedish_ci collation)
            $table->text('notification_secret_key')->nullable()->collation('latin1_swedish_ci');

            // 'new_version_code' column (nullable integer)
            $table->integer('new_version_code')->nullable();

            // 'is_force_update' column (nullable integer)
            $table->integer('is_force_update')->nullable();

            // 'is_update_active' column (integer, non-nullable, default value 1)
            $table->integer('is_update_active')->default(1);

            // 'app_maintenance' column (integer, non-nullable, default value 0)
            $table->integer('app_maintenance')->default(0);

            // 'primary_color' column (nullable text, latin1_swedish_ci collation)
            $table->text('primary_color')->nullable()->collation('latin1_swedish_ci');

            // 'init_wallet_amt' column (integer, non-nullable, default value 0)
            $table->integer('init_wallet_amt')->default(0);

            // 'init_wallet_amt_referral' column (integer, non-nullable, default value 0)
            $table->integer('init_wallet_amt_referral')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('settings');
    }
};
