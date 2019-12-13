<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStudentRegisterationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //This table will be created dynamically
        //Naming schema will be student_registeration_(Speciality_id)_(year))
        Schema::create('student_registeration', function (Blueprint $table) {
            $table->bigInteger('university_id');
            $table->integer('semester_id');
            $table->float('fee');
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
        Schema::dropIfExists('student_registeration');
    }
}
