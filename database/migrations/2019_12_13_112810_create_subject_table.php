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
            $table->integer('subject_id')->primary();
            $table->string('subject_name', 50);
            $table->tinyInteger('subject_hours');
            $table->integer('speciality_id');//distingush every subject with specific speciality
            $table->timestamps();
        });

        //FK
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
