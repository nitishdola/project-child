<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCheckupDiseasesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('checkup_diseases', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('checkup_id', false, true);
            $table->integer('disease_id', false, true);
            $table->integer('sub_disease_id', false, true);
            $table->timestamps();

            $table->foreign('disease_id')->references('id')->on('diseases');
            $table->foreign('sub_disease_id')->references('id')->on('sub_diseases');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('checkup_diseases');
    }
}
