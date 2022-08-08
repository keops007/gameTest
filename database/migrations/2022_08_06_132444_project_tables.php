<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ProjectTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //competition
        if (!Schema::hasTable('game_competition'))
        Schema::create('game_competition', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->nullable();
            $table->string('slug')->nullable();
            $table->unsignedInteger('players_number')->index();
            $table->boolean('is_active')->default(1)->index();

            $table->softDeletes();
            $table->timestamps();
        });

        if (!Schema::hasTable('game_player'))
            Schema::create('game_player', function (Blueprint $table) {
                $table->increments('id');
                $table->unsignedInteger('competition_id')->index();
                $table->string('name')->nullable();
                $table->string('slug')->nullable();
                $table->unsignedInteger('points')->default(0)->index();

                $table->foreign('competition_id')->references('id')->on('game_competition')->onDelete('cascade');

                $table->softDeletes();
                $table->timestamps();
            });

        if (!Schema::hasTable('game_competition_player_log'))
            Schema::create('game_competition_player_log', function (Blueprint $table) {
                $table->increments('id');
                $table->unsignedInteger('competition_id')->index();
                $table->unsignedInteger('players_id')->index();
                $table->unsignedInteger('points')->index();

                $table->foreign('competition_id')->references('id')->on('game_competition')->onDelete('cascade');
                $table->foreign('players_id')->references('id')->on('game_player')->onDelete('cascade');

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
        //
    }
}
