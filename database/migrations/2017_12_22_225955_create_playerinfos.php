<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePlayerinfos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('playerinfos', function (Blueprint $table) {
            $table->integer('account_id');
            $table->integer('overall_r')->default('0');
            $table->integer('sf')->default('0');
            $table->integer('lf')->default('0');
            $table->integer('level')->default('0');
            $table->integer('clan_id')->default('0');
            $table->integer('karma')->default('0');
            $table->integer('ap')->default('0');




            $table->foreign('account_id')->references('id')->on('users');
            $table->foreign('clan_id')->references('id')->on('clans');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('playerinfos');
    }
}
