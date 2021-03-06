<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class BuildAttr extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('construct_pro', function (Blueprint $table) {
            $table->id('id_c_p');
            $table->integer('id_c');
            $table->integer('id_re');
            $table->integer('value_p')->nullable();
            $table->integer('percent_p')->nullable();
            $table->integer('unit_p')->nullable();
            $table->integer('feature')->nullable();
            $table->text('desc_p');
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
        Schema::dropIfExists('construct_attr');
    }
}
