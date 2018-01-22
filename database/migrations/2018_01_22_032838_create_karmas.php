<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKarmas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('karmas', function (Blueprint $table) {
            $table->integer('account_id');
            $table->integer('target_id');
            $table->integer('match_id');
            $table->string('do');
            $table->text('reason');

            $table->foreign('account_id')->references('id')->on('users');
            $table->foreign('target_id')->references('id')->on('users');
            $table->foreign('match_id')->references('id')->on('matches');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('karmas');
    }
}
