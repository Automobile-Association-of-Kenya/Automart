<?php

use App\Models\Subscription;
use App\Models\Subsproperty;
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
        Schema::create('subscription_property', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Subscription::class);
            $table->foreignIdFor(Subsproperty::class);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('subscription_property');
    }
};
