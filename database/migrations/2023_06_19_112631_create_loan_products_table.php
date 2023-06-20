<?php

use App\Models\Partner;
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
        Schema::create('loan_products', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Partner::class);
            $table->string('name', 80);
            $table->string('period', 3);
            $table->string('method', 40);
            $table->string('deposit',4);
            $table->string('interest',3);
            $table->float('limit',12,2);
            $table->string('status',1)->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('loan_products');
    }
};
