<?php

use App\Models\Subscription;
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
        Schema::create('accounts', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Subscription::class)->nullable();
            $table->string('provider')->nullable();
            $table->string('pp_client_id')->unique()->nullable();
            $table->string('pp_client_secret')->unique()->nullable();
            $table->string('business_name')->nullable();
            $table->string('pp_card_number')->unique()->nullable();
            $table->string('pp_expiry')->nullable();
            $table->string('pp_cw')->nullable();
            $table->string('mpesa_secret')->unique()->nullable();
            $table->string('mpesa_customer_key')->unique()->nullable();
            $table->string('mpesa_pass_kwy')->nullable();
            $table->string('mpesa_business_short_code')->unique()->nullable();
            $table->string('mpesa_transaction_type')->nullable();
            $table->string('currency', 10)->nullable();
            $table->string('active')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('accounts');
    }
};
