<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMatchSumms extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('match_summs', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('port');
            $table->dateTime('created_at');
            $table->string('map');
            $table->integer('server_id');

            $table->foreign('server_id')->references('id')->on('servers');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('match_summs');
    }
}
