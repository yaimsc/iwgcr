<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContactPeopleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contact_people', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name'); 
            $table->string('centre_telephonecode');
            $table->string('centre_phone')->nullable(); 
            $table->string('mobile_telephonecode');
            $table->string('mobile_phone')->nullable();
            $table->string('email'); 
            $table->string('centre_name'); 
            $table->integer('centre_number');
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
        Schema::dropIfExists('contact_people');
    }
}
