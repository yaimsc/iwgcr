<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDoorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('doors', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('centre_name');
            $table->string('country');
            $table->string('interior_photo'); 
            $table->string('front_photo');
            $table->string('exterior_photo');
            $table->string('placement_photo');
            $table->string('placement_photo_optional')->nullable();
            $table->string('door_name');
            $table->float('exterior_length');
            $table->float('interior_length');
            $table->string('type_length');
            $table->boolean('distance_knobs_frame_ok');
            $table->boolean('quotation');
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
        Schema::dropIfExists('doors');
    }
}
