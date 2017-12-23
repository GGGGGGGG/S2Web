<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePlayerstats extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('playerstats', function (Blueprint $table) {
            $table->integer('account_id');
            $table->integer('exp')->default('0');
            $table->integer('earned_exp')->default('0');
            $table->integer('wins')->default('0');
            $table->integer('losses')->default('0');
            $table->integer('d_conns')->default('0');
            $table->integer('kills')->default('0');
            $table->integer('assists')->default('0');
            $table->integer('souls')->default('0');
            $table->integer('razed')->default('0');
            $table->integer('pdmg')->default('0');
            $table->integer('bdmg')->default('0');
            $table->integer('npc')->default('0');
            $table->integer('hp_healed')->default('0');
            $table->integer('res')->default('0');
            $table->integer('gold')->default('0');
            $table->integer('hp_repaired')->default('0');
            $table->integer('secs')->default('0');
            $table->integer('total_secs')->default('0');
            $table->integer('malphas')->default('0');
            $table->integer('revenant')->default('0');
            $table->integer('devourer')->default('0');



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
        Schema::dropIfExists('playerstats');
    }
}
