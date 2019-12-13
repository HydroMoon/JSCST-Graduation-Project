<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStdTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //Some information is missing
        //We will look back into this file *important*
        Schema::create('student', function (Blueprint $table) {
            $table->bigInteger('university_id');
            $table->string('student_name', 150);
            $table->string('phone_num', 15)->nullable();
            $table->string('gender', 10);
            $table->string('nationality', 50);
            $table->string('certificate_type', 50);
            $table->string('certificate_source', 50);
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
        Schema::dropIfExists('std');
    }
}
