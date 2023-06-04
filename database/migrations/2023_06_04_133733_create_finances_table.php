<?php

use App\Models\Partner;
use App\Models\User;
use App\Models\Vehicle;
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
        Schema::create('finances', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(User::class)->nullable();
            $table->foreignIdFor(Vehicle::class);
            $table->foreignIdFor(Partner::class);
            $table->string('name', 60)->nullable();
            $table->string('email', 60)->nullable();
            $table->string('phone', 16)->nullable();
            $table->string('subject', 60);
            $table->string('amount', 12);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('finances');
    }
};
