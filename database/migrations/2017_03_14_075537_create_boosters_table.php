<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBoostersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('boosters', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('vaccine_id',false,true);
            $table->integer('checkup_id', false, true);
            $table->timestamps();

            $table->foreign('vaccine_id')->references('id')->on('vaccines');
            $table->foreign('checkup_id')->references('id')->on('checkups');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('boosters');
    }
}
