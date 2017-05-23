<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCheckupOtherVaccinesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('checkup_other_vaccines', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('checkup_id',false,true);
            $table->integer('other_vaccine_id',false,true);
            $table->timestamps();

            $table->foreign('other_vaccine_id')->references('id')->on('other_vaccines');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('checkup_other_vaccines');
    }
}
