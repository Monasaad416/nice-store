<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStoresTable extends Migration {

	public function up()
	{
		Schema::create('stores', function(Blueprint $table) {
			$table->increments('id');
			$table->string('name');
			$table->string('slug');
			$table->string('email')->unique();
			$table->string('phone')->nullable();
			$table->string('address')->nullable();
			$table->integer('category_id')->unsigned()->nullable();
			$table->text('description')->nullable();
			$table->string('image')->nullable();
			$table->string('cover_image')->nullable();
			$table->tinyInteger('status')->default(1);
			$table->timestamp('email_verified_at')->nullable();
			$table->string('password');
			$table->rememberToken();
			$table->timestamps();
		});
	}

	public function down()
	{
		Schema::drop('stores');
	}
}
