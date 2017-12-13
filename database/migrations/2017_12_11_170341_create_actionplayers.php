<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateActionplayers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('actionplayers', function (Blueprint $table) {
            $table->integer('user');
            $table->integer('match');
            $table->integer('team');
            $table->integer('exp');
            $table->integer('kills');
            $table->integer('deaths');
            $table->integer('assists');
            $table->integer('souls');
            $table->integer('razed');
            $table->integer('pdmg');
            $table->integer('bdmg');
            $table->integer('npc');
            $table->integer('hp_healed');
            $table->integer('res');
            $table->integer('gold');
            $table->integer('hp_repaired');
            $table->integer('secs');
            $table->ipAddress('ip');

            $table->foreign('user')->references('id')->on('users');
            $table->foreign('match')->references('id')->on('matches');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('actionplayers');
    }
}
