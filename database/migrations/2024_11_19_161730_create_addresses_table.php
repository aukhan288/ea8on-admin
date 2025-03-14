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
        Schema::create('addresses', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')->nullable();

            // 'home_number' column (text, nullable, latin1_swedish_ci collation)
            $table->text('home_number')->nullable()->collation('latin1_swedish_ci');

            // 'society' column (text, nullable, latin1_swedish_ci collation)
            $table->text('society')->nullable()->collation('latin1_swedish_ci');

            // 'area' column (text, nullable, latin1_swedish_ci collation)
            $table->text('area')->nullable()->collation('latin1_swedish_ci');

            // 'city' column (text, nullable, latin1_swedish_ci collation)
            $table->text('city')->nullable()->collation('latin1_swedish_ci');

            // 'pincode' column (integer, nullable with a default value of 441904)
            $table->integer('pincode')->nullable()->default(441904);

            // 'landmark' column (text, nullable, latin1_swedish_ci collation)
            $table->text('landmark')->nullable()->collation('latin1_swedish_ci');

            // 'type' column (text, nullable, latin1_swedish_ci collation)
            $table->text('type')->nullable()->collation('latin1_swedish_ci');

            // 'status' column (integer, non-nullable, default value 1)
            $table->integer('status')->default(1); // 1 for active, 0 for inactive

            // 'address_name' column (text, nullable, latin1_swedish_ci collation)
            $table->text('address_name')->nullable()->collation('latin1_swedish_ci');

            // 'is_delete' column (integer, nullable)
            $table->integer('is_delete')->nullable();

            // Add foreign key constraint to 'user_id' (references 'users' table)
            $table->foreign('user_id')->references('id')->on('users')->onDelete('set null');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('addresses');
    }
};
