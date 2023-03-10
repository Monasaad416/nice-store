<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;


class CreateCategoriesTable extends Migration {

	public function up()
	{
		Schema::create('categories', function(Blueprint $table) {
			$table->increments('id');
			$table->string('name');
			$table->string('slug');
            $table->text('description')->nullable();
			$table->integer('parent_id')->unsigned()->nullable();
			$table->tinyInteger('status')->default(1);
			$table->string('image')->nullable();
			$table->timestamps();
		});
	}

	public function down()
	{
		Schema::drop('categories');
	}
}
