<?php

use App\Models\Dealer;
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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('ref_no')->unique();
            $table->string('name', 100);
            $table->string('email', 60)->unique();
            $table->string('phone', 16)->nullable();
            $table->string('alt_phone', 14)->nullable();
            $table->string('role', 60)->nullable();
            $table->string('google_id')->unique()->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('profile')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
