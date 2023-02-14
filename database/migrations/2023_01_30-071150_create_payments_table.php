<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('order_id')->nullable()->onDelete('set null');
            $table->decimal('amount', 5, 2);
            $table->foreignId('currency_id')->nullable()->onDelete('set null');
            $table->foreignId('payment_method_id')->nullable()->onDelete('set null');
            $table->enum('status', array('pending', 'paid', 'failed','cancelled'))->default('pending');
            $table->string('transaction_id')->nullable();
            $table->json('transaction_data')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('payments');
    }
};
