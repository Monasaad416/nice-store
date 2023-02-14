<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateOrderAddressesTable extends Migration {

	public function up()
	{
		Schema::create('order_addresses', function(Blueprint $table) {
			$table->increments('id');
			$table->integer('order_id')->unsigned();
			$table->foreignId('city_id')->constaind();
			$table->enum('type', array('billing', 'shipping'));
			$table->string('first_name');
			$table->string('last_name');
			$table->string('email');
			$table->string('phone');
			$table->string('street');
			// $table->string('shipping_address');
			$table->string('zip_code')->nullable();
			$table->timestamps();
		});
	}

	public function down()
	{
		Schema::drop('order_addresses');
	}
}