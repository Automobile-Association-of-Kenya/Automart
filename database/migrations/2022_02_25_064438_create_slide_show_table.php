<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSlideShowTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('slide_show', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('country');
            $table->string('county');
            $table->string('make');
            $table->string('model');
            $table->string('year');
            $table->string('price');
            $table->string('miles');
            $table->string('vin')->unique();
            $table->string('exterior');
            $table->string('interior');
            $table->string('fuel_type');
            $table->longText('features');
            $table->string('transmission');
            $table->string('vehicle_type');
            $table->longText('description');
            $table->longText('images');
            $table->string('firstname');
            $table->string('lastname');
            $table->string('email');
            $table->string('phone');
            $table->string('carId');
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
        Schema::dropIfExists('slide_show');
    }
}
