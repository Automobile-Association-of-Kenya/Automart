<?php

use App\Models\User;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCarsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('caronsells', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(User::class)->constrained();
            $table->string('title');
            $table->string('country');
            $table->string('county');
            $table->string('make');
            $table->string('model');
            $table->string('year');
            $table->string('price');
            $table->string('miles');
            $table->string('enginecc');
            $table->string('exterior');
            $table->string('interior');
            $table->string('fuel_type');
            $table->longText('features');
            $table->string('transmission');
            $table->string('vehicle_type');
            $table->longText('description');
            $table->longText('images');
            $table->string('trans_id')->nullable(true);
            $table->string('package')->nullable(true);
            $table->string('deal_slideshow')->nullable(true);
            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('caronsells');
    }
}
