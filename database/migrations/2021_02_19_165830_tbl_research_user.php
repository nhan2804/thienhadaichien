<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TblResearchUser extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_research', function (Blueprint $table) {
            $table->id('id_u_r');
            $table->integer('id_user_r');
            $table->integer('id_rese');
            $table->integer('status_r');
            $table->integer('quantity_r');
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
        Schema::dropIfExists('user_research');
    }
}
