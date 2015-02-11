<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBoardGameVersionPublisherTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('board_game_version_publisher', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('board_game_version_id')->unsigned();
			$table->integer('publisher_id')->unsigned();
			$table->foreign('board_game_version_id')->references('id')->on('board_game_versions');
			$table->foreign('publisher_id')->references('id')->on('publishers');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('board_game_version_publisher');
	}

}
