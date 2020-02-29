<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateConfigVariablesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('config_variables', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title');
            $table->string('notes');
            $table->string('type');
            $table->text('default_values');
            $table->string('key');
            $table->text('value');
            $table->bigInteger('sortorder');
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
        Schema::dropIfExists('config_variables');
    }
}
