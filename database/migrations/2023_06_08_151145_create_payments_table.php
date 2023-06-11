<?php

use App\Models\Account;
use App\Models\Dealer;
use App\Models\Subscription;
use App\Models\User;
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
        Schema::create('payments', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(User::class)->nullable()->constrained();
            $table->foreignIdFor(Dealer::class)->nullable()->constrained();
            $table->foreignIdFor(Subscription::class)->nullable()->constrained();
            $table->foreignIdFor(Account::class)->constrained();
            $table->string('name')->nullable();
            $table->string('phone')->nullable();
            $table->string('trans_id')->unique()->nullable();
            $table->string('crid')->unique()->nullable();
            $table->string('mrid')->unique()->nullable();
            $table->string('amount', 20)->nullable();
            $table->string('trans_time')->nullable();
            $table->string('org_balance')->nullable();
            $table->tinyInteger('complete',1)->default(0);
            $table->dateTime('completed_at')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payments');
    }
};
