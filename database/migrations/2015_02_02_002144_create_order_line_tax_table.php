<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrderLineTaxTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('order_line_tax', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('order_line_id')->unsigned();
			$table->integer('tax_id')->unsigned();
			$table->foreign('order_line_id')->references('id')->on('order_lines');
			$table->foreign('tax_id')->references('id')->on('taxes');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('order_line_tax');
	}

}
