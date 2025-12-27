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
        Schema::table('reviews', function (Blueprint $table) {
            $table->decimal('cleanliness', 3, 1)->nullable()->after('ratings');
            $table->decimal('communication', 3, 1)->nullable()->after('ratings');
            $table->decimal('respect_house_rules', 3, 1)->nullable()->after('ratings');
            $table->boolean('is_public')->default(false)->after('ratings');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('reviews', function (Blueprint $table) {
            $table->dropColumns(['cleanliness', 'communication', 'respect_house_rules', 'is_public']);
        });
    }
};
