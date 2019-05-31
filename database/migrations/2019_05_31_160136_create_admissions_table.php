<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAdmissionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('admissions', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('student_id');
            // Do you have any other children studying at this institute?
            $table->boolean('other_children_at_institute')->default('false');
            $table->boolean('accept_terms_conditions')->default('false');
            $table->dateTime('date_received')->nullable();
            $table->dateTime('enrolment_date')->nullable();
            $table->string('application_number')->nullable();
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
        Schema::dropIfExists('admissions');
    }
}
