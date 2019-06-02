<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFormerCoursesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('former_courses', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('student_id')->unsigned();
            $table->string('madrasa_name');
            $table->string('teacher_name');
            $table->string('teacher_number');
            $table->json('books'); //{book_name: '', qaidah: '', quran: ''}
            $table->string('leaving_reason');
            $table->string('former_education_details');
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
        Schema::dropIfExists('former_courses');
    }
}
