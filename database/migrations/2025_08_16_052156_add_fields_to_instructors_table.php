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
       Schema::table('instructors', function (Blueprint $table) {
            $table->string('profile_image')->nullable()->after('user_id');
            $table->string('area_of_expertise')->nullable()->after('expertise');
            $table->string('qualification')->nullable()->after('area_of_expertise');
            $table->string('video_editing_skill')->nullable()->after('qualification');
            $table->string('target_audience')->nullable()->after('video_editing_skill');
            $table->text('short_bio')->nullable()->after('target_audience');
            $table->string('card_type', 50)->nullable()->after('short_bio');
            $table->string('card_number', 50)->nullable()->after('card_type');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
       Schema::table('instructors', function (Blueprint $table) {
            $table->dropColumn([
                'profile_image',
                'area_of_expertise',
                'qualification',
                'video_editing_skill',
                'target_audience',
                'short_bio',
                'card_type',
                'card_number',
            ]);
        });

    }
};
