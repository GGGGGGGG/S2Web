<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBuddies extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('buddies', function (Blueprint $table) {
            $table->integer('source_id');
            $table->integer('target_id');
            $table->string('note');


            $table->foreign('source_id')->references('id')->on('users');
            $table->foreign('target_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('buddies');
    }
}
