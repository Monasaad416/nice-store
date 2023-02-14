<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateOrdersTable extends Migration {

	public function up()
	{
		Schema::create('orders', function(Blueprint $table) {
			$table->increments('id');
			$table->integer('client_id')->unsigned()->nullable();
			$table->integer('store_id')->unsigned()->nullable();
			$table->string('order_number');
			$table->decimal('price')->default(0);
			$table->decimal('total_price')->comment('including shipping fees and taxes')->default(0);
			// $table->string('email');
			// $table->string('phone');
			$table->tinyInteger('status')->default('1');
			// $table->enum('payment_status', array('pending', 'paid', 'failed'))->default('pending');
			$table->integer('payment_method_id')->unsigned()->nullable();
			$table->timestamps();
		});
	}

	public function down()
	{
		Schema::drop('orders');
	}
}