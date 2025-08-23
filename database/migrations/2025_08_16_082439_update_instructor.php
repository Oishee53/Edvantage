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
            $table->string('card_holder_name')->nullable()->after('card_type');
            $table->string('expiry_date')->nullable()->after('card_number');
            $table->string('cvv')->nullable()->after('expiry_date');
            $table->string('bank_name')->nullable()->after('cvv');
    
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
       Schema::table('instructors', function (Blueprint $table) {
            $table->dropColumn([
                'card_holder_name',
                'expiry_date',
                'cvv',
                'bank_name',
            ]);
        });

    }
};
