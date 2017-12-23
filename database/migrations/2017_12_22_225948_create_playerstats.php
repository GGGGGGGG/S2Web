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
            $table->integer('exp');
            $table->integer('earned_exp');
            $table->integer('wins');
            $table->integer('losses');
            $table->integer('d_conns');
            $table->integer('kills');
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
            $table->integer('total_secs');
            $table->integer('malphas');
            $table->integer('revenant');
            $table->integer('devourer');



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
