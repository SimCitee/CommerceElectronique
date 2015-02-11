<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBoardGameVersionEventTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('board_game_version_event', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('board_game_version_id')->unsigned();
			$table->integer('event_id')->unsigned();
			$table->foreign('board_game_version_id')->references('id')->on('board_game_versions');
			$table->foreign('event_id')->references('id')->on('events');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('board_game_version_event');
	}

}
