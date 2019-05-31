<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('students', function (Blueprint $table) {
            $table->bigIncrements('id'); // student id

            $table->string('surname');
            $table->string('forename');
            $table->date('date_of_birth');
            $table->enum('gender', ['male', 'female']);
            $table->text('address');
            $table->string('post_code');
            $table->string('telephone');
            $table->string('mobile');
            $table->string('relationship_to_child')->nullable();

            // Relations
            $table->integer('country_id')->unsigned(); // Country of Birth
            $table->integer('ethnic_origin_id')->unsigned()->nullable(); // Ethnic Origin
            $table->integer('language_id')->unsigned(); // Mother tongue/First Language
            $table->integer('nationality_id')->unsigned(); // Nationality
//            $table->integer('course_id')->nullable();

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
    }
}
