<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCheckupFamilyHistoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('checkup_family_histories', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('checkup_id',false,true);
            $table->integer('family_history_id',false,true);
            $table->timestamps();

            $table->foreign('family_history_id')->references('id')->on('family_histories');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('checkup_family_histories');
    }
}
