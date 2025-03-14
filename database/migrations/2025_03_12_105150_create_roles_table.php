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
        Schema::create('roles', function (Blueprint $table) {
            $table->id(); // Auto-increment primary key
            $table->string('name')->unique(); // Unique name for the role (Admin, Customer, Delivery Boy)
            $table->timestamps(); // Laravel's created_at and updated_at fields
        });

        // Insert predefined roles
        DB::table('roles')->insert([
            ['name' => 'admin'],
            ['name' => 'customer'],
            ['name' => 'delivery boy'],
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('roles');
    }
};
