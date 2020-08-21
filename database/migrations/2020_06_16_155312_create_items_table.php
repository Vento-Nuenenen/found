<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('items', function (Blueprint $table) {
            $table->id();
            $table->integer('item_identifier');
            $table->string('item_name');
            $table->string('item_color')->nullable();
            $table->string('item_size')->nullable();
            $table->boolean('item_returned')->default(false);
            $table->integer('item_price')->nullable();
            $table->boolean('item_sold')->default(false);
            $table->string('item_img')->nullable();
            $table->foreignId('event_id')->nullable();
            $table->foreignId('group_id')->nullable();
            $table->foreignId('customer_id')->nullable();
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
        Schema::dropIfExists('items');
    }
}
