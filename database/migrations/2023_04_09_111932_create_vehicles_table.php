<?php

use App\Models\Country;
use App\Models\County;
use App\Models\Dealer;
use App\Models\Make;
use App\Models\Type;
use App\Models\User;
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
        Schema::create('vehicles', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(User::class)->constrained();
            $table->foreignIdFor(Dealer::class)->nullable()->constrained();
            $table->foreignIdFor(Type::class)->constrained();
            $table->foreignIdFor(Make::class)->constrained();
            $table->foreignIdFor(VehicleModel::class,)->constrained();
            $table->unsignedBigInteger('contry_of_origin')->foreign()->references('id')->on(Country::class);
            $table->unsignedBigInteger('country_located')->foreign()->references('id')->on(Country::class);
            $table->foreignIdFor(County::class)->nullable()->constrained();
            $table->string('vehicle_no', 20)->unique();
            $table->string('shipping_to');
            $table->string('year');
            $table->string('price');
            $table->string('color');
            $table->string('miles');
            $table->string('enginecc');
            $table->string('interior');
            $table->string('fuel_type');
            $table->string('transmission');
            $table->text('description');
            $table->text('cover_photo');
            $table->text('images');
            $table->text('tags', 255);
            $table->string('views')->default(0);
            $table->string('likes')->default(0);
            $table->string('dislikes')->default(0);
            $table->timestamps();
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
