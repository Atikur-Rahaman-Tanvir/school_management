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
        Schema::create('student_addresses', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('admission_id');
            $table->string('country');
            $table->string('state');
            $table->string('city');
            $table->text('address');
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
        Schema::dropIfExists('student_addresses');
    }
};
