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
            $table->integer('wins')->default('0');
            $table->integer('losses')->default('0');
            $table->integer('d_conns')->default('0');
            $table->integer('exp')->default('0');
            $table->integer('earned_exp')->default('0');
            $table->integer('builds')->default('0');
            $table->integer('gold')->default('0');
            $table->integer('razed')->default('0');
            $table->integer('hp_healed')->default('0');
            $table->integer('pdmg')->default('0');
            $table->integer('kills')->default('0');
            $table->integer('assists')->default('0');
            $table->integer('debuffs')->default('0');
            $table->integer('buffs')->default('0');
            $table->integer('orders')->default('0');
            $table->integer('secs')->default('0');
            $table->integer('winstreak')->default('0');

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
