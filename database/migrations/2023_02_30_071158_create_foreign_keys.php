<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Eloquent\Model;

class CreateForeignKeys extends Migration {

	public function up()
	{
		Schema::table('categories', function(Blueprint $table) {
			$table->foreign('parent_id')->references('id')->on('categories')
						->onDelete('set null')
						->onUpdate('set null');
		});
		Schema::table('products', function(Blueprint $table) {
			$table->foreign('category_id')->references('id')->on('categories')
						->onDelete('no action')
						->onUpdate('no action');
		});
		Schema::table('products', function(Blueprint $table) {
			$table->foreign('store_id')->references('id')->on('stores')
						->onDelete('cascade')
						->onUpdate('cascade');
		});
		Schema::table('orders', function(Blueprint $table) {
			$table->foreign('client_id')->references('id')->on('clients')
						->onDelete('set null')
						->onUpdate('set null');
		});
		Schema::table('orders', function(Blueprint $table) {
			$table->foreign('store_id')->references('id')->on('stores')
						->onDelete('cascade')
						->onUpdate('cascade');
		});
		Schema::table('orders', function(Blueprint $table) {
			$table->foreign('payment_method_id')->references('id')->on('payment_methods')
						->onDelete('set null')
						->onUpdate('set null');
		});

	
		Schema::table('stores', function(Blueprint $table) {
			$table->foreign('category_id')->references('id')->on('categories')
						->onDelete('set null')
						->onUpdate('set null');
		});
		Schema::table('product_tag', function(Blueprint $table) {
			$table->foreign('product_id')->references('id')->on('products')
						->onDelete('cascade')
						->onUpdate('cascade');
		});
		Schema::table('product_tag', function(Blueprint $table) {
			$table->foreign('tag_id')->references('id')->on('tags')
						->onDelete('cascade')
						->onUpdate('cascade');
		});
		Schema::table('carts', function(Blueprint $table) {
			$table->foreign('client_id')->references('id')->on('clients')
						->onDelete('cascade')
						->onUpdate('cascade');
		});
		Schema::table('carts', function(Blueprint $table) {
			$table->foreign('product_id')->references('id')->on('products')
						->onDelete('cascade')
						->onUpdate('cascade');
		});
		Schema::table('order_details', function(Blueprint $table) {
			$table->foreign('order_id')->references('id')->on('orders')
						->onDelete('cascade')
						->onUpdate('cascade');
		});
		Schema::table('order_details', function(Blueprint $table) {
			$table->foreign('product_id')->references('id')->on('products')
						->onDelete('set null')
						->onUpdate('set null');
		});
		Schema::table('order_addresses', function(Blueprint $table) {
			$table->foreign('order_id')->references('id')->on('orders')
						->onDelete('cascade')
						->onUpdate('cascade');
		});


		// Schema::table('payments', function(Blueprint $table) {
		// 	$table->foreign('order_id')->references('id')->on('orders')
		// 				->onDelete('cascade')
		// 				->onUpdate('cascade');
		// });

		// Schema::table('payments', function(Blueprint $table) {
		// 	$table->foreign('payment_method_id')->references('id')->on('payment_methods')
		// 				->onDelete('set null')
		// 				->onUpdate('setr null');
		// });

		// Schema::table('payments', function(Blueprint $table) {
		// 	$table->foreign('currency_id')->references('id')->on('currencies')
		// 				->onDelete('cascade')
		// 				->onUpdate('cascade');
		// });
	}

	public function down()
	{
		Schema::table('categories', function(Blueprint $table) {
			$table->dropForeign('categories_parent_id_foreign');
		});
		Schema::table('products', function(Blueprint $table) {
			$table->dropForeign('products_category_id_foreign');
		});
		Schema::table('products', function(Blueprint $table) {
			$table->dropForeign('products_store_id_foreign');
		});
		Schema::table('orders', function(Blueprint $table) {
			$table->dropForeign('orders_client_id_foreign');
		});
		Schema::table('orders', function(Blueprint $table) {
			$table->dropForeign('orders_store_id_foreign');
		});
		Schema::table('orders', function(Blueprint $table) {
			$table->dropForeign('orders_payment_method_id_foreign');
		});
		Schema::table('stores', function(Blueprint $table) {
			$table->dropForeign('stores_category_id_foreign');
		});
		Schema::table('product_tag', function(Blueprint $table) {
			$table->dropForeign('product_tag_product_id_foreign');
		});
		Schema::table('product_tag', function(Blueprint $table) {
			$table->dropForeign('product_tag_tag_id_foreign');
		});
		Schema::table('carts', function(Blueprint $table) {
			$table->dropForeign('carts_client_id_foreign');
		});
		Schema::table('carts', function(Blueprint $table) {
			$table->dropForeign('carts_product_id_foreign');
		});
		Schema::table('order_details', function(Blueprint $table) {
			$table->dropForeign('order_details_order_id_foreign');
		});
		Schema::table('order_details', function(Blueprint $table) {
			$table->dropForeign('order_details_product_id_foreign');
		});
		Schema::table('order_addresses', function(Blueprint $table) {
			$table->dropForeign('order_addresses_order_id_foreign');
		});

		// Schema::table('payments', function(Blueprint $table) {
		// 	$table->dropForeign('payments_order_id_foreign');
		// });

		// Schema::table('payments', function(Blueprint $table) {
		// 	$table->dropForeign('payments_payment_method_id_foreign');
		// });

		// Schema::table('payments', function(Blueprint $table) {
		// 	$table->dropForeign('payments_currency_id_foreign');
		// });
	}
}