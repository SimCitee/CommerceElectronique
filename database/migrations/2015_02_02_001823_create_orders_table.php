<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('orders', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('user_id')->unsigned();
			$table->integer('box_quantity')->unsigned();
			$table->boolean('is_payed')->default(false);;
			$table->boolean('is_shipped')->default(false);;
			$table->boolean('is_picked_up')->default(false);;
			$table->string('payment_id', 100)->nullable();
			$table->string('shipment_id', 100)->nullable();
			$table->string('pick_up_id', 100)->nullable();
			$table->string('tracking_number', 100)->nullable();
			$table->foreign('user_id')->references('id')->on('users');
			$table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('orders');
	}

}
