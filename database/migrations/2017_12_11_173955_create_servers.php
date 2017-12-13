<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateServers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('servers', function (Blueprint $table) {
            $table->increments('id');
            $table->ipAddress('ip');
            $table->integer('port');
            $table->integer('num_conn');
            $table->integer('max_conn');
            $table->string('name');
            $table->string('description');
            $table->integer('minlevel');
            $table->integer('maxlevel');
            $table->integer('official');
            $table->timestamp('updated');


            $table->foreign('server')->references('id')->on('servers');
            $table->foreign('map')->references('id')->on('maps');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('servers');
    }
}
