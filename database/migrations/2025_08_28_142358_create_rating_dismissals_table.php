<?php

// database/migrations/2025_08_23_000001_create_rating_dismissals_table.php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('rating_dismissals', function (Blueprint $table) {
            $table->id();
            $table->foreignId('course_id')->constrained('courses')->cascadeOnDelete();
            $table->foreignId('user_id')->constrained('users')->cascadeOnDelete();
            $table->timestamps();
            $table->unique(['course_id','user_id']);
        });
    }
    public function down(): void {
        Schema::dropIfExists('rating_dismissals');
    }
};
