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
        Schema::create('notifications', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id')->default(0);

            // 'title' column (text, non-nullable, with latin1_swedish_ci collation)
            $table->text('title')->collation('latin1_swedish_ci');

            // 'img' column (text, nullable, with latin1_swedish_ci collation)
            $table->text('img')->nullable()->collation('latin1_swedish_ci');

            // 'msg' column (text, non-nullable, with latin1_swedish_ci collation)
            $table->text('msg')->collation('latin1_swedish_ci');

            // 'date' column (datetime, non-nullable)
            $table->datetime('date');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('notifications');
    }
};
