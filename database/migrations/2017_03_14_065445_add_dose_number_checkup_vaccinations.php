<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddDoseNumberCheckupVaccinations extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('checkup_vaccinations', function (Blueprint $table) {
            $table->integer('dose_number',false,true)->after('vaccine_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('checkup_vaccinations', function (Blueprint $table) {
            //
        });
    }
}
