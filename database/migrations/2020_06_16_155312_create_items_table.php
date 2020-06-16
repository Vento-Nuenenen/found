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
            $table->boolean('returned')->default(false);
            $table->double('item_price')->nullable();
            $table->boolean('for_sale')->default(false);
            $table->boolean('sold')->default(false);
            $table->foreignId('fk_events')->nullable();
            $table->foreignId('fk_groups')->nullable();
            $table->foreignId('fk_customers')->nullable();
            $table->softDeletes()->nullable();
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
