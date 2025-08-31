<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        // Make sure you have doctrine/dbal installed: composer require doctrine/dbal
        Schema::table('courses', function (Blueprint $table) {
            // Add new columns if they don't exist
            if (!Schema::hasColumn('courses', 'module')) {
                $table->integer('module')->default(0)->after('category');
            }

            if (!Schema::hasColumn('courses', 'status')) {
                $table->enum('status', ['not submitted', 'pending', 'rejected', 'approved'])
                      ->default('not submitted')
                      ->after('price');
            }

            // Drop old columns
            if (Schema::hasColumn('courses', 'video_count')) {
                $table->dropColumn('video_count');
            }
            if (Schema::hasColumn('courses', 'approx_video_length')) {
                $table->dropColumn('approx_video_length');
            }
            if (Schema::hasColumn('courses', 'total_duration')) {
                $table->dropColumn('total_duration');
            }
        });
    }

    public function down(): void
    {
        Schema::table('courses', function (Blueprint $table) {
            // Drop added columns
            if (Schema::hasColumn('courses', 'module')) {
                $table->dropColumn('module');
            }
            if (Schema::hasColumn('courses', 'status')) {
                $table->dropColumn('status');
            }

            // Recreate old columns
            if (!Schema::hasColumn('courses', 'video_count')) {
                $table->integer('video_count')->default(0)->after('description');
            }
            if (!Schema::hasColumn('courses', 'approx_video_length')) {
                $table->string('approx_video_length')->nullable()->after('video_count');
            }
            if (!Schema::hasColumn('courses', 'total_duration')) {
                $table->string('total_duration')->nullable()->after('approx_video_length');
            }
        });
    }
};
