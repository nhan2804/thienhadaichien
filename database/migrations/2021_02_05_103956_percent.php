<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Percent extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('construct_percent', function (Blueprint $table) {
            $table->id('id_c_pe');
            $table->integer('id_c');
            $table->integer('id_re');
            $table->integer('value_pe')->nullable();
            $table->integer('percent_pe')->nullable();
            $table->integer('unit_pe')->nullable();
            $table->text('desc_pe');
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
        Schema::dropIfExists('construct_percent');
    }
}
