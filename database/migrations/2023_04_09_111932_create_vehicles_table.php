<?php

use App\Models\Country;
use App\Models\County;
use App\Models\Dealer;
use App\Models\Make;
use App\Models\Type;
use App\Models\User;
use App\Models\VehicleModel;
use App\Models\Yard;
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
        Schema::create('vehicles', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(User::class)->nullable()->constrained();
            $table->foreignIdFor(Dealer::class)->nullable()->constrained();
            $table->foreignIdFor(Type::class)->nullable()->constrained();
            $table->foreignIdFor(Make::class)->constrained();
            $table->foreignIdFor(VehicleModel::class)->constrained();
            $table->unsignedBigInteger('contry_of_origin')->nullable()->foreign()->references('id')->on(Country::class);
            // $table->unsignedBigInteger('country_located')->nullable()->foreign()->references('id')->on(Country::class);
            // $table->foreignIdFor(County::class)->nullable()->constrained();
            $table->foreignIdFor(Yard::class)->nullable();
            $table->string('vehicle_no', 20)->unique()->nullable();
            $table->string('shipping_to')->nullable();
            $table->string('year');
            $table->string('price');
            $table->string('location')->nullable();
            $table->string('color')->nullable();
            $table->string('mileage', 6)->nullable();
            $table->string('enginecc', 6)->nullable();
            $table->string('interior')->nullable();
            $table->string('fuel_type')->nullable();
            $table->string('transmission')->nullable();
            $table->string('gear', 60)->nullable();
            $table->string('speed', 60)->nullable();
            $table->string('terrain', 60)->nullable();
            $table->string('engine', 60)->nullable();
            $table->string('horsepower', 60)->nullable();
            $table->string('usage', 60)->nullable();
            $table->text('description')->nullable();
            // $table->text('cover_photo')->nullable();
            // $table->text('images')->nullable();
            $table->text('tags', 255)->nullable();
            $table->string('views')->default(0);
            $table->string('likes')->default(0);
            $table->string('priority',1)->default(9);
            $table->string('status', 30)->default('pending');
            $table->boolean('sponsored')->default(false);
            $table->timestamps();
            $table->timestamp('sold_at')->nullable();
            $table->softDeletes();
            $table->foreignId('updated_by')->nullable()->constrained()->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vehicles');
    }
};
