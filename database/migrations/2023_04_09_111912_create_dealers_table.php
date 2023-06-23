<?php

use App\Models\County;
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
        Schema::create('dealers', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(County::class)->nullable();
            $table->string('name', 100);
            $table->string('email', 100)->nullable()->unique();
            $table->string('phone',18)->nullable();
            $table->string('alt_phone',18)->nullable();
            $table->string('postal_address',100)->nullable();
            $table->string('address',100)->nullable();
            $table->string('city', 80)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dealers');
    }
};
