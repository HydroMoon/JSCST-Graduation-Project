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
        //Will help degree_id table to get the info according to specific id
        Schema::create('degree_info', function (Blueprint $table) {
            $table->integerIncrements('degree_id');
            $table->tinyInteger('semester_id')->unsigned();//Get Subject Info(Name etc..)
            $table->integer('speciality_id')->unsigned();//Get student info(speciality_student_(Speciality_id)_(year))
            $table->integer('degree_year');//Year for the current degree/help to creat/retrive data from dynamic table
            $table->timestamps();
        });

        //FK
        Schema::table('degree_info', function (Blueprint $table) {
            $table->foreign('semester_id')
            ->references('semester_id')
            ->on('semester')
            ->onDelete('cascade')
            ->onUpdate('cascade');

            $table->foreign('speciality_id')
            ->references('speciality_id')
            ->on('speciality')
            ->onDelete('cascade')
            ->onUpdate('cascade');
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
