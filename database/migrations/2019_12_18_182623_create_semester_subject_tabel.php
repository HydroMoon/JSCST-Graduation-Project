<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSemesterSubjectTabel extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('semester_subject', function (Blueprint $table) {
            $table->tinyInteger('semester_id')->unsigned();
            $table->integer('subject_id')->unsigned();
            $table->primary(['semester_id', 'subject_id']);
            $table->timestamps();
        });

         //WE HAVE TO DO SOMETHING
         Schema::table('semester_subject', function (Blueprint $table) {
            $table->foreign('semester_id')
            ->references('semester_id')
            ->on('semester')
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
        Schema::dropIfExists('semester_subject');
    }
}
