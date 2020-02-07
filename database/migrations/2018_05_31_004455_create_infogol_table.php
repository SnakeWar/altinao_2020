<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInfogolTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('infogoals', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('players_id')->unsigned();
            $table->integer('games_id')->unsigned();
            $table->integer('quantidade');
            $table->foreign('players_id')->references('id')->on('players');
            $table->foreign('games_id')->references('id')->on('games');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('infgoals', function (Blueprint $table) {
            //
        });
    }
}
