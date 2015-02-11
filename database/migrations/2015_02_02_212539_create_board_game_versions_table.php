<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBoardGameVersionsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('board_game_versions', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('product_id')->unsigned();
			$table->integer('board_game_id')->unsigned()->nullable();
			$table->integer('language_id')->unsigned();
			$table->integer('extend_board_game_id')->unsigned()->nullable();
			$table->integer('minimum_players')->unsigned()->nullable();
			$table->integer('maximum_players')->unsigned()->nullable();
			$table->integer('minimum_age')->unsigned()->nullable();
			$table->integer('average_game_time')->unsigned()->nullable();
			$table->text('website')->nullable();
			$table->date('release_date')->nullable();
			$table->timestamps();
			$table->foreign('product_id')->references('id')->on('products');
			$table->foreign('board_game_id')->references('id')->on('board_games');
			$table->foreign('language_id')->references('id')->on('languages');
			$table->foreign('extend_board_game_id')->references('id')->on('board_game_versions');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('board_game_versions');
	}

}
