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
            $table->id(); // auto-incrementing primary key
            $table->string('full_name', 50);
            $table->string('email', 100)->unique(); // unique email column
            $table->boolean('account_verified')->default(false)->nullable();
            $table->string('password');
            $table->enum('role', ['user', 'admin'])->default('user');
            $table->timestamps(); // created_at and updated_at columns
        });

        // Insert data into the users table
        DB::table('users')->insert([
            'full_name' => 'Anass Boutaib',
            'email' => 'anass@gmail.com',
            'password' => password_hash('123456789', PASSWORD_BCRYPT),
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
