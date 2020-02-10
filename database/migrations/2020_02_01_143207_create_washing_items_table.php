<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWashingItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('washing_items', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('washing_id');
            $table->unsignedBigInteger('color_id');
            $table->unsignedBigInteger('size_id');
            $table->unsignedBigInteger('design_id');
            $table->bigInteger('quantity');
            $table->timestamps();

            $table->foreign('washing_id')
                ->references('id')->on('washings')
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
        Schema::dropIfExists('washing_items');
    }
}
