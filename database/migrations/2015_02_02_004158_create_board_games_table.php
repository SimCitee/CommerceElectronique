<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBoardGamesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('board_games', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('board_game_family_id')->unsigned();
			$table->string('name', 200);
			$table->foreign('board_game_family_id')->references('id')->on('board_game_families');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('board_games');
	}

}
