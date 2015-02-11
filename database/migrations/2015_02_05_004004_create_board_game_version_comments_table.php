<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBoardGameVersionCommentsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('board_game_version_comments', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('board_game_version_id')->unsigned();
			$table->integer('user_id')->unsigned();
			$table->integer('rating')->unsigned();
			$table->text('text');
			$table->timestamps();
			$table->foreign('board_game_version_id')->references('id')->on('board_game_versions');
			$table->foreign('user_id')->references('id')->on('users');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('board_game_version_comments');
	}

}
