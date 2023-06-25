<?php

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
        Schema::create('purchases', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(User::class)->nullable()->constrained();
            $table->foreignIdFor(Vehicle::class)->constrained();
            $table->string('name',80);
            $table->string('id_no',10);
            $table->string('phone',16);
            $table->string('email',80);
            $table->string('pickup',80);
            $table->string('estate',80)->nullable();
            $table->string('housenumber',80)->nullable();
            $table->string('payment_method',80);
            $table->string('status',1)->default(0);
            $table->timestamps();
            $table->timestamp('completed_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('purchases');
    }
};
