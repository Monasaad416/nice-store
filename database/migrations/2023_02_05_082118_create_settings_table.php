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
        Schema::create('settings', function (Blueprint $table) {
            $table->id();
            $table->string('email')->nullable();
            $table->string('phone')->nullable();
            $table->string('address')->nullable();
			$table->text('about_us')->nullable();
            $table->string('fb_url')->nullable();
			$table->string('tw_url')->nullable();
			$table->string('insta_url')->nullable();
			$table->string('youtube_url')->nullable();
			$table->decimal('shipping_fees')->nullable();
            $table->decimal('taxes')->nullable();
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
        Schema::dropIfExists('settings');
    }
};
