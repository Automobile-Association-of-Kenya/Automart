<?php

use App\Models\Country;
use App\Models\Industry;
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
        Schema::create('loans', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(User::class)->nullable();
            $table->foreignIdFor(Vehicle::class)->constrained();
            $table->string('title');
            $table->string('firstname');
            $table->string('lastname');
            $table->string('date_of_birth');
            $table->string('email');
            $table->string('phone');
            $table->string('kra_pin');
            $table->string('id_no');
            $table->foreignIdFor(Country::class)->nullable();
            $table->string('city');
            $table->string('estate');
            $table->string('house_no');
            $table->string('occupation');
            $table->string('employement_type')->nullable();
            $table->foreignIdFor(Industry::class)->nullable();
            $table->string('proffession')->nullable();
            $table->string('employer')->nullable();
            $table->string('years_of_employment')->nullable();
            $table->string('employer_address')->nullable();
            $table->string('business')->nullable();
            $table->string('businessowner')->nullable();
            $table->string('business_name')->nullable();
            $table->string('business_reg_no')->nullable();
            $table->string('businesstype')->nullable();
            $table->string('businessaddress')->nullable();
            $table->string('type_of_bank_account');
            $table->string('bank');
            $table->string('accountholdername');
            $table->string('account_number');
            $table->string('bank_account_type');
            $table->string('monthly_turnover');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('loans');
    }
};
