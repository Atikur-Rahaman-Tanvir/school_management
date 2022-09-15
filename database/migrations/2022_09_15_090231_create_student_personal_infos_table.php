<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('student_personal_infos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('admission_id');
            $table->string('student_name');
            $table->string('student_f_name');
            $table->string('student_m_name');
            $table->date('date_of_birth');
            $table->string('phone_number');
            $table->string('gender');
            $table->foreign('admission_id')->references('id')->on('admissions')->onDelete('cascade');
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
        Schema::dropIfExists('student_personal_infos');
    }
};
