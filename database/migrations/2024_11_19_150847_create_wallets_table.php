<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWalletsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('wallets', function (Blueprint $table) {
            // Create primary key 'id' with AUTO_INCREMENT
            $table->id();

            // Create 'user_id' column (foreign key to user table, assuming 'users' table exists)
            $table->unsignedBigInteger('user_id');

            // Create 'ref_user_id' column (reference to another user, default 0)
            $table->unsignedBigInteger('ref_user_id')->default(0);

            // Create 'amount' column (float type, non-nullable)
            $table->float('amount');

            // Create 'closing_amount' column (float type, non-nullable)
            $table->float('closing_amount');

            // Create 'flag' column (text type, utf8mb4_general_ci collation, non-nullable)
            $table->text('flag')->charset('utf8mb4')->collation('utf8mb4_general_ci');

            // Create 'remark' column (text type, utf8mb4_general_ci collation, non-nullable)
            $table->text('remark')->charset('utf8mb4')->collation('utf8mb4_general_ci');

            // Create 'date' column (datetime or date type, non-nullable)
            $table->timestamp('date');

            // Add foreign key constraint to 'user_id' (if 'users' table exists)
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');

            // Add timestamps for created_at and updated_at columns
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('wallets');
    }
}
