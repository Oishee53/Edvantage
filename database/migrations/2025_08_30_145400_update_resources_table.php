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
        Schema::table('resources', function (Blueprint $table) {
            // Rename column (requires doctrine/dbal)
            $table->string('moduleName')->after('moduleNumber');

            // Add new column after moduleNumber
            $table->string('lectureName')->after('lectureNumber');
        });
    }

    public function down(): void
    {
        Schema::table('resources', function (Blueprint $table) {
            $table->dropColumn('moduleName');
            $table->dropColumn('lectureName');
        });
    }
};
