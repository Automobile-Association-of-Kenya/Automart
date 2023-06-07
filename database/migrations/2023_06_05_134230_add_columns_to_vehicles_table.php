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
        Schema::table('vehicles', function (Blueprint $table) {
            $table->string('gear', 60)->nullable();
            $table->string('speed', 60)->nullable();
            $table->string('terrain', 60)->nullable();
            $table->string('engine', 60)->nullable();
            $table->string('horsepower', 60)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('vehicles', function (Blueprint $table) {
            $table->dropColumn('gear');
            $table->dropColumn('speed');
            $table->dropColumn('terrain');
            $table->dropColumn('engine');
            $table->dropColumn('horsepower');
        });
    }
};
