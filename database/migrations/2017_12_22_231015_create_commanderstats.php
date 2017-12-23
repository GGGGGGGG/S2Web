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
            $table->integer('c_wins')->default('0');
            $table->integer('c_losses')->default('0');
            $table->integer('c_d_conns')->default('0');
            $table->integer('c_exp')->default('0');
            $table->integer('c_earned_exp')->default('0');
            $table->integer('c_builds')->default('0');
            $table->integer('c_gold')->default('0');
            $table->integer('c_razed')->default('0');
            $table->integer('c_hp_healed')->default('0');
            $table->integer('c_pdmg')->default('0');
            $table->integer('c_kills')->default('0');
            $table->integer('c_assists')->default('0');
            $table->integer('c_debuffs')->default('0');
            $table->integer('c_buffs')->default('0');
            $table->integer('c_orders')->default('0');
            $table->integer('c_secs')->default('0');
            $table->integer('c_winstreak')->default('0');

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
