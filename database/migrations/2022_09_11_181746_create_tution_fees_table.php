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
        Schema::create('tution_fees', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('ClassModel_id');
            $table->unsignedBigInteger('department_id')->nullable();
            $table->string('fees_name');
            $table->string('amount');
            $table->foreign('ClassModel_id')->references('id')->on('class_models')->onDelete('cascade');
            $table->foreign('department_id')->references('id')->on('departments')->onDelete('cascade');
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
        Schema::dropIfExists('tution_fees');
    }
};
