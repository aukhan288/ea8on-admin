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
        Schema::create('areas', function (Blueprint $table) {
            $table->id();
            $table->text('name')->collation('latin1_swedish_ci');

            // 'delivery_charge' column (float, non-nullable)
            $table->float('delivery_charge');

            // 'is_active' column (integer, non-nullable, default value 1)
            // 1 for active, 0 for inactive
            $table->integer('is_active')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('areas');
    }
};
