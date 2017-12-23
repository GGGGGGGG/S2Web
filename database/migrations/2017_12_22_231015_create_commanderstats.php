<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCommanderstats extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('commanderstats', function (Blueprint $table) {
            $table->increments('account_id');
            $table->integer('c_wins');
            $table->integer('c_losses');
            $table->integer('c_d_conns');
            $table->integer('c_exp');
            $table->integer('c_earned_exp');
            $table->integer('c_builds');
            $table->integer('c_gold');
            $table->integer('c_razed');
            $table->integer('c_hp_healed');
            $table->integer('c_pdmg');
            $table->integer('c_kills');
            $table->integer('c_assists');
            $table->integer('c_debuffs');
            $table->integer('c_buffs');
            $table->integer('c_orders');
            $table->integer('c_secs');
            $table->integer('c_winstreak');

            $table->foreign('account_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('commanderinfos');
    }
}
