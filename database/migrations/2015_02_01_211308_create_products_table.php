<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateProductsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('products', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('inventory_status_id')->unsigned();
			$table->string('name', 200);
			$table->text('description');
			$table->decimal('length', 5, 2)->nullable();
			$table->decimal('width', 5, 2)->nullable();
			$table->decimal('height', 5, 2)->nullable();
			$table->decimal('weight', 5, 2)->nullable();
			$table->string('image_path', 100);
			$table->string('sku', 50)->nullable();
			$table->string('upc', 50)->nullable();
			$table->integer('quantity')->unsigned()->default(0);
			$table->date('date_available')->nullable();
			$table->boolean('is_archived')->default(false);;
			$table->boolean('is_inactive')->default(false);;
			$table->timestamps();
			$table->foreign('inventory_status_id')->references('id')->on('inventory_statuses');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('products');
	}
}
