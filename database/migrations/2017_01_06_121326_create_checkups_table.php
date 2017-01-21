<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCheckupsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('checkups', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('student_id', false, true);
            $table->date('checkup_date');
            $table->decimal('height', 10,2)->commect('in centi meters');
            $table->decimal('weight', 10,2)->commect('in grams');
            $table->string('section',20)->nullable();
            $table->string('class',20);
            $table->string('stream',20)->nullable();
            $table->string('remarks',500)->nullable();
            $table->tinyInteger('status')->default(1);

            $table->foreign('student_id')->references('id')->on('students');
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
        Schema::dropIfExists('checkups');
    }
}
