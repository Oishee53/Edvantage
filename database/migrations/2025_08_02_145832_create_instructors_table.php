<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
     public function up(): void {
        Schema::create('instructors', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->unique()->onDelete('cascade');
            $table->text('bio')->nullable();
            $table->string('area_of_expertise')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void {
        Schema::dropIfExists('instructors');
    }
};
