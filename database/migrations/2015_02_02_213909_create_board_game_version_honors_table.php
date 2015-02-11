<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBoardGameVersionHonorsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('board_game_version_honors', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('board_game_version_id')->unsigned();
			$table->integer('honor_id')->unsigned();
			$table->integer('award_year');
			$table->foreign('board_game_version_id')->references('id')->on('board_game_versions');
			$table->foreign('honor_id')->references('id')->on('honors');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('board_game_version_honors');
	}

}
