<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCartsTable extends Migration {

	public function up()
	{
		Schema::create('carts', function(Blueprint $table) {
			$table->uuid('id')->primary();
			$table->timestamps();
			$table->uuid('cookie_id');
			$table->integer('client_id')->unsigned()->nullable();
			$table->integer('product_id')->unsigned();
			$table->mediumInteger('qty')->unsigned();
			$table->json('options')->nullable();

			$table->unique(['cookie_id','product_id']);
		});
	}

	public function down()
	{
		Schema::drop('carts');
	}
}
