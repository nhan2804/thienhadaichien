<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Militaryuser extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('military_user', function (Blueprint $table) {
            $table->id('id_m_u');
            $table->integer('id_user_m');
            $table->integer('id_mili_m');
            $table->integer('status_m');
            $table->datetime('time_end');
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
        Schema::dropIfExists('military_user');
    }
}
