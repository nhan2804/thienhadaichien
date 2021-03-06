<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Payload extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('construct_pay', function (Blueprint $table) {
            $table->id('id_c_pa');
            $table->integer('id_c');
            $table->integer('id_re');
            $table->integer('value_pa')->nullable();
            $table->integer('percent_pa')->nullable();
            $table->integer('unit_pa')->nullable();
            $table->text('desc_pa');
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
        Schema::dropIfExists('construct_pay');
    }
}
