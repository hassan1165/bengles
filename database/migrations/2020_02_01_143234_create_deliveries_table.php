<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDeliveriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('deliveries', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->date('date');
            $table->unsignedBigInteger('customer_id');
            $table->string('claim');
            $table->unsignedBigInteger('labour_id');
            $table->tinyInteger('status')->default(1);
            $table->timestamps();

            $table->foreign('customer_id')
                ->references('id')->on('customers')
                ->onUpdate('cascade');

            $table->foreign('labour_id')
                ->references('id')->on('labours')
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
        Schema::dropIfExists('deliveries');
    }
}
