<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Migrations\Migration;

class CreateOrderDetailsTable extends Migration {
    
    use SoftDeletes;
	public function up()
	{
		Schema::create('order_details', function(Blueprint $table) {
			$table->increments('id');
			$table->integer('order_id')->unsigned();
			$table->integer('product_id')->unsigned()->nullable();
			$table->string('product_name');
			$table->decimal('product_price');
			$table->json('options')->nullable();
			$table->mediumInteger('qty')->default(1);
			$table->softDeletes();
			$table->timestamps();

			$table->unique(['order_id','product_id']);
		});
	}

	public function down()
	{
		Schema::drop('order_details');
	}
}
