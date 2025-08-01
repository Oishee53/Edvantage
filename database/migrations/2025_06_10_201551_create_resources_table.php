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
        Schema::create('resources', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('courseId');
            $table->unsignedBigInteger('moduleId')->nullable(); // If modules table exists, you can add FK later
            $table->string('videos')->nullable(); // You can store video URL or path
            $table->string('pdf')->nullable();    // You can store file name/path
            $table->timestamps();
            $table->foreign('courseId')->references('id')->on('courses')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('resources');
    }
};
