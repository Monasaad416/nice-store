<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;


class CreateProductsTable extends Migration {

	public function up()
	{
		Schema::create('products', function(Blueprint $table) {
			$table->increments('id');
			$table->string('name');
			$table->string('slug');
			$table->integer('category_id')->unsigned();
			$table->integer('available_qty')->unsigned()->default(1);
			$table->integer('store_id')->unsigned();
			$table->decimal('price');
            $table->decimal('discount_price');
			$table->string('image');
			$table->text('description')->nullable();
			$table->timestamps();
			$table->tinyInteger('status')->default(1);
		});
	}

	public function down()
	{
		Schema::drop('products');
	}
}
