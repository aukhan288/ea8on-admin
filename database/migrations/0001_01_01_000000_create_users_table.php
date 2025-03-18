<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id(); // Auto-increment primary key
            $table->text('name')->nullable(); // Nullable text field for name
            $table->text('email')->nullable(); // Nullable text field for email
            $table->text('mobile')->nullable(); // Nullable text field for mobile
            $table->datetime('registration_date')->nullable(); // Nullable datetime field
            $table->text('password')->nullable(); // Nullable text field for password
            $table->integer('status')->default(1); // Integer field with default value 1
            $table->text('pin')->nullable(); // Nullable text field for pin
            $table->text('app_key')->nullable(); // Nullable text field for app key
            $table->text('user_token')->nullable(); // Nullable text field for user token
            $table->text('img')->nullable(); // Nullable text field for image
            $table->text('ref_code')->nullable(); // Nullable text field for reference code
            $table->integer('is_delete')->default(0); // Integer field with default value 0
            $table->bigInteger('role_id'); // Allow NULL and add foreign key
            $table->rememberToken();
            $table->timestamps(); // Laravel's created_at and updated_at fields
            $table->softDeletes();
        });

        Schema::create('password_reset_tokens', function (Blueprint $table) {
            $table->string('email')->primary();
            $table->string('token');
            $table->timestamp('created_at')->nullable();
        });

        Schema::create('sessions', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->foreignId('user_id')->nullable()->index();
            $table->string('ip_address', 45)->nullable();
            $table->text('user_agent')->nullable();
            $table->longText('payload');
            $table->integer('last_activity')->index();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
        Schema::dropIfExists('password_reset_tokens');
        Schema::dropIfExists('sessions');
    }
};
