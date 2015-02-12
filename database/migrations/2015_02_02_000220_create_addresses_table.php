<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAddressesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('addresses', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('street_number')->unsigned();
			$table->string('apartment', 10)->nullable();
			$table->string('street_name', 150);
			$table->string('city', 100);
			$table->string('country', 100);
			$table->string('province', 100);
			$table->string('zip_code', 20);
			$table->float('latitude')->nullable();
			$table->float('longitude')->nullable();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('addresses');
	}

}
