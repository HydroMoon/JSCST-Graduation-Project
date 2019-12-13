<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDegreeInfoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('degree_info', function (Blueprint $table) {
            $table->integerIncrements('degree_id');
            $table->integer('semester_id');//Get Subject Info(Name etc..)
            $table->integer('speciality_id');//Get student info(Name etc...)
            $table->integer('degree_year');//Year for the current degree/help to creat/retrive data from dynamic table
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
        Schema::dropIfExists('degree_info');
    }
}
