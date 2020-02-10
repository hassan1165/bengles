<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateIncomingItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('incoming_items', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('incoming_id');
            $table->unsignedBigInteger('color_id');
            $table->unsignedBigInteger('size_id');
            $table->unsignedBigInteger('design_id');
            $table->bigInteger('quantity');
            $table->timestamps();


            $table->foreign('incoming_id')
                ->references('id')->on('incomings')
                ->onUpdate('cascade');

            $table->foreign('color_id')
                ->references('id')->on('colors')
                ->onUpdate('cascade');

            $table->foreign('size_id')
                ->references('id')->on('sizes')
                ->onUpdate('cascade');

            $table->foreign('design_id')
                ->references('id')->on('designs')
                ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('incoming_items');
    }
}
