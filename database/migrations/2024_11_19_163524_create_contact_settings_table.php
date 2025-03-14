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
        Schema::create('contact_settings', function (Blueprint $table) {
            $table->id();
            $table->text('title')->nullable()->collation('latin1_swedish_ci');

            // 'description' column (text, nullable, with latin1_swedish_ci collation)
            $table->text('description')->nullable()->collation('latin1_swedish_ci');

            // 'link' column (text, nullable, with latin1_swedish_ci collation)
            $table->text('link')->nullable()->collation('latin1_swedish_ci');

            // 'icon' column (text, nullable, with latin1_swedish_ci collation)
            $table->text('icon')->nullable()->collation('latin1_swedish_ci');

            // 'is_active' column (integer, non-nullable, default value 1)
            $table->integer('is_active')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('contact_settings');
    }
};
