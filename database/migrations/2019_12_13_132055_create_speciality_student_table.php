<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSpecialityStudentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //Speciality name will be for every year
        //Also will be created according to batch year
        //This table will be dynamically created at some point
        //mohand (table name  will speciality_student_(Speciality_id)_(year))
        Schema::create('speciality_student', function (Blueprint $table) {
            $table->integerIncrements('id');
            $table->bigInteger('university_id');
            $table->string('semster_name', 20)->nullable();
            $table->boolean('transfer_active')->default(0);//According to this colmun we transfer the student to degree table
            $table->timestamps();
        });

        //FK
        Schema::table('speciality_student', function (Blueprint $table) {
            $table->foreign('university_id')
            ->references('university_id')
            ->on('student')
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
        Schema::dropIfExists('speciality_student');
    }
}
