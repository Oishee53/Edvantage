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
        Schema::create('options', function (Blueprint $table) {
    $table->id();
    $table->unsignedBigInteger('question_id');
    $table->string('option_text');
    $table->boolean('is_correct')->default(false);
    $table->timestamps();
});

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('options');
    }
};
