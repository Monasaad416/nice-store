<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;


class CreateProductTagTable extends Migration {

	public function up()
	{
		Schema::create('product_tag', function(Blueprint $table) {
			$table->increments('id');
			$table->integer('product_id')->unsigned();
			$table->integer('tag_id')->unsigned();
			$table->timestamps();
		});
	}

	public function down()
	{
		Schema::drop('product_tag');
	}
}
