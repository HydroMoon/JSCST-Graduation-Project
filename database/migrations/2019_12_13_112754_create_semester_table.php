<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSemesterTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('semester', function (Blueprint $table) {
            $table->tinyInteger('semester_id')->primary();
            $table->string('semester_name', 20);
            $table->integer('subject_id');
            $table->timestamps();
        });

        //WE HAVE TO DO SOMETHING
        // Schema::table('semester', function (Blueprint $table) {
        //     $table->foreign('subject_id')
        //     ->references('subject_id')
        //     ->on('subject')
        //     ->onDelete('cascade')
        //     ->onUpdate('cascade');
        // });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('semester');
    }
}
