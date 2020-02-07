<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJogoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('games', function (Blueprint $table) {
            $table->increments('id');
            $table->string('data', 30);
            $table->integer('placar_casa');
            $table->integer('placar_visitante');
            $table->integer('teams_casa')->unsigned();
            $table->integer('teams_visitante')->unsigned();
            $table->foreign('teams_casa')->references('id')->on('teams');
            $table->foreign('teams_visitante')->references('id')->on('teams');
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
        Schema::table('games', function (Blueprint $table) {
            //
        });
    }
}
