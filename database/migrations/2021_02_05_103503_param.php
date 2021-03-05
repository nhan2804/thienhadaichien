<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Param extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('construct_param', function (Blueprint $table) {
            $table->id('id_c_pm');
            $table->integer('id_c');
            $table->integer('id_re');
            $table->integer('value_pm')->nullable();
            $table->integer('percent_pm')->nullable();
            $table->integer('unit_pm')->nullable();
            $table->text('desc_pm');
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
        Schema::dropIfExists('construct_param');
    }
}
