<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class OrdersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('orders', function($table){
			$table->increments('id');
			$table->string('address');
			$table->string('city');
			$table->string('county');
			$table->string('post_code');
			$table->string('card_name');
			$table->string('card_number');
			$table->integer('card_expire');
			$table->integer('card_csv');
			$table->string('first_name');
			$table->string('last_name');
			$table->string('email');
			$table->string('products');
			$table->integer('total');
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
