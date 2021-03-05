<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class BuffAttr extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('buff_attr', function (Blueprint $table) {
            $table->id('id_buff_a');
            $table->integer('id_buff')->nullable();
            $table->integer('id_planet')->nullable();
            $table->integer('percent')->nullable();
            $table->integer('value')->nullable();
            $table->integer('id_resource')->nullable();
            $table->text('desc_buff_a')->nullable();
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
        Schema::dropIfExists('buff_attr');
    }
}
