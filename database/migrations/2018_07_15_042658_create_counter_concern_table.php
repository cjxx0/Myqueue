<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;


class CreateCounterConcernTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('students', function (Blueprint $table) {
          $table->increments('id');
          $table->string('student_number');
          $table->string('student_type_id');
          $table->string('student_concern');
          $table->timestamps();
      });

        Schema::create('studenttype', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->timestamps();
        });

        Schema::create('concern', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->integer('id_studenttype')->unsigned();
            $table->foreign('id_studenttype')->references('id')->on('studenttype')->onDelete('cascade');
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
        Schema::dropIfExists('students');
        Schema::drop('studenttype');
        Schema::drop('concern');
    }
}
