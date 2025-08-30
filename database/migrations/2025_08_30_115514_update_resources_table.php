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
            $table->renameColumn('moduleId', 'moduleNumber');

            // Add new column after moduleNumber
            $table->integer('lectureNumber')->nullable()->after('moduleNumber');
        });
    }

    public function down(): void
    {
        Schema::table('resources', function (Blueprint $table) {
            // Drop lectureNumber
            $table->dropColumn('lectureNumber');

            // Rename back to moduleId
            $table->renameColumn('moduleNumber', 'moduleId');
        });
    }
};
