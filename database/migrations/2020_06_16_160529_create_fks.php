<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFks extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('items', function(Blueprint $table){
            $table->foreign('fk_events')->references('id')->on('events')->onDelete('cascade');
            $table->foreign('fk_groups')->references('id')->on('groups')->onDelete('cascade');
            $table->foreign('fk_customers')->references('id')->on('customers')->onDelete('cascade');
        });
    }
}
