<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAllergyCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('allergy_categories', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->integer('allergy_id',false,true);
            $table->integer('status',false,true)->default(1);
            $table->timestamps();

            $table->foreign('allergy_id')->references('id')->on('allergies');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('allergy_categories');
    }
}
