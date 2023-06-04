<?php

use App\Models\Make;
use App\Models\User;
use App\Models\Vehicle;
use App\Models\VehicleModel;
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
        Schema::create('tradeins', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(User::class)->nullable();
            $table->string('name', 60)->nullable();
            $table->string('email', 60)->nullable();
            $table->string('phone', 16)->nullable();
            $table->foreignIdFor(Vehicle::class);
            $table->foreignIdFor(Make::class);
            $table->foreignIdFor(VehicleModel::class);
            $table->string('year')->nullable();
            $table->string('reg_no');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tradeins');
    }
};
