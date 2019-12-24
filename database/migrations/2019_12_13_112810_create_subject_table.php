<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSubjectTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('subject', function (Blueprint $table) {
            $table->integerIncrements('subject_id');
            $table->string('subject_name', 50);
            $table->tinyInteger('subject_hours');
            //Will look further the road maybe delete
            //We moved it into semester_subject table
            $table->integer('speciality_id')->unsigned();//distingush every subject with specific speciality
            $table->timestamps();
        });

        //FK
        //Same thing as the above
        Schema::table('subject', function (Blueprint $table) {
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
        Schema::dropIfExists('subject');
    }
}
