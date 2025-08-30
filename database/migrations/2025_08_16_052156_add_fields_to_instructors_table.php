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
            $table->string('qualification')->nullable()->after('area_of_expertise');
            $table->string('video_editing_skill')->nullable()->after('qualification');
            $table->string('target_audience')->nullable()->after('video_editing_skill');
            $table->string('card_type', 50)->nullable()->after('bio');
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
                'qualification',
                'video_editing_skill',
                'target_audience',
                'card_type',
                'card_number',
            ]);
        });

    }
};
