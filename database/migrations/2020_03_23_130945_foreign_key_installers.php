<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ForeignKeyInstallers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('installers', function (Blueprint $table) {
            $table->integer('centre_name');
            $table->foreign('centre_name')->references('name')->on('centres');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('installers', function (Blueprint $table) {
            $table->dropForeign('installers_centre_name_centres'); 
            $table->dropColumn('centre_name');

        });
    }
}
