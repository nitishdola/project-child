<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCheckupAllergiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('checkup_allergies', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('checkup_id',false,true);
            $table->integer('allergy_id',false,true);
            $table->integer('allergy_category_id',false,true);
            $table->string('remarks')->nullable();
            $table->timestamps();

            $table->foreign('allergy_id')->references('id')->on('allergies');
            $table->foreign('allergy_category_id')->references('id')->on('allergy_categories');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('checkup_allergies');
    }
}
