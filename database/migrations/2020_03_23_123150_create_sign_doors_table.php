<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSignDoorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sign_doors', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('interior_photo'); 
            $table->string('exterior_photo');
            $table->string('installation_photo'); 
            $table->string('iq_cylinder_photo');
            $table->boolean('purple_light');
            $table->boolean('mac_whitelisted');
            $table->boolean('centre_activated_titan');
            $table->boolean('maintenance_tags_given_centre');
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
        Schema::dropIfExists('sign_doors');
    }
}
