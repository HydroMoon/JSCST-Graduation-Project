<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDegreeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //Dynamic table will be name according to degree_info table PK_ID
        //This table will be dynamically created
        //Dynamic table will be created using information derived from this table
        //Table naming schema will be degree_(degree_info_id)
        Schema::create('degree', function (Blueprint $table) {
            $table->integerIncrements('id');
            $table->bigInteger('university_id');//will be inserted according to student speciality
            $table->integer('subject_id');//will be inserted according to the semester which the student study in
            $table->float('degree', 2, 2);
            $table->timestamps();
        });

        Schema::table('degree', function (Blueprint $table) {
            $table->foreign('university_id')
            ->references('university_id')
            ->on('student')
            ->onDelete('cascade')
            ->onUpdate('cascade');

            $table->foreign('subject_id')
            ->references('subject_id')
            ->on('subject')
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
        Schema::dropIfExists('degree');
    }
}
