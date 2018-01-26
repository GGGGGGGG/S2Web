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
            $table->string('login');
            $table->string('description');
            $table->integer('minlevel');
            $table->integer('maxlevel');
            $table->string('status');
            $table->string('next_map');
            $table->string('map');
            $table->integer('official');
            $table->timestamp('updated');
            $table->boolean('online');
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
