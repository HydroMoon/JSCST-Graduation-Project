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
        //mohand (table name  will speciality_student_(Speciality)_(year))
        Schema::create('speciality_student', function (Blueprint $table) {
            $table->integerIncrements('id');
            $table->integer('university_id');
            $table->string('semster_name')->nullable();
            $table->boolean('transfer_active')->default(0);
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
        Schema::dropIfExists('speciality_student');
    }
}
