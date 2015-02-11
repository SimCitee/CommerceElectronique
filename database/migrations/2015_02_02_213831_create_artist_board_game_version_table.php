<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateArtistBoardGameVersionTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('artist_board_game_version', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('board_game_version_id')->unsigned();
			$table->integer('artist_id')->unsigned();
			$table->foreign('board_game_version_id')->references('id')->on('board_game_versions');
			$table->foreign('artist_id')->references('id')->on('artists');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('artist_board_game_version');
	}

}
