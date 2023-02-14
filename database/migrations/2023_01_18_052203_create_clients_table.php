<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClientsTable extends Migration {

	public function up()
	{
		Schema::create('clients', function(Blueprint $table) {
			$table->increments('id');
			$table->string('name');
			$table->string('email')->unique();
             		$table->timestamp('email_verified_at')->nullable();
			$table->string('password');
			$table->string('address')->nullable();
			$table->string('phone')->nullable();
			$table->tinyInteger('status')->default(1);
			$table->rememberToken();
			$table->timestamps();
		});
	}

	public function down()
	{
		Schema::drop('clients');
	}
}
