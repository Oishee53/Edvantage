<?php

// database/migrations/2025_08_23_000000_create_ratings_table.php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('ratings', function (Blueprint $table) {
            $table->id();
            $table->foreignId('course_id')->constrained('courses')->cascadeOnDelete();
            $table->foreignId('user_id')->constrained('users')->cascadeOnDelete();
            $table->unsignedTinyInteger('score'); // 1..5
            $table->text('comment')->nullable();
            $table->timestamps();

            $table->unique(['course_id','user_id']); // one rating per student per course
            $table->index(['course_id','score']);
        });

        Schema::table('courses', function (Blueprint $table) {
            $table->decimal('avg_rating', 3, 2)->default(0)->after('price'); // adjust 'after' as you like
            $table->unsignedInteger('rating_count')->default(0)->after('avg_rating');
        });
    }

    public function down(): void {
        Schema::table('courses', function (Blueprint $table) {
            $table->dropColumn(['avg_rating','rating_count']);
        });
        Schema::dropIfExists('ratings');
    }
};

