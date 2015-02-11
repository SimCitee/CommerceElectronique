<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('users', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('group_id')->unsigned();
			$table->integer('address_id')->unsigned();
			$table->string('first_name', 100);
			$table->string('last_name', 100);
			$table->date('birth_date');
			$table->string('phone', 25);
			$table->string('email', 150);
			$table->string('username', 150);
			$table->string('password', 512);
			$table->timestamps();
			$table->foreign('group_id')->references('id')->on('groups');
			$table->foreign('address_id')->references('id')->on('addresses');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('users');
	}

}
