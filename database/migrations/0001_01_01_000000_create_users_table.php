<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->string('email')->primary();       // ✅ Primary key
            $table->string('name');                   // User name
            $table->string('phone')->nullable();      // Optional phone
            $table->string('password');               // Hashed password
            $table->string('field')->nullable();      // Area of interest
            $table->rememberToken();                  // "Remember me" login
            $table->timestamps();                     // created_at & updated_at
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
