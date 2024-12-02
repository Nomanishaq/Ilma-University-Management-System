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
        Schema::create('quiz_details', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('quiz_id');
            $table->unsignedBigInteger('faculty');
            $table->unsignedBigInteger('program');
            $table->unsignedBigInteger('session');
            $table->unsignedBigInteger('semester');
            $table->unsignedBigInteger('section');
            $table->unsignedBigInteger('course');
            $table->unsignedBigInteger('teacher');
            $table->unsignedBigInteger('exam_hours');
            $table->unsignedBigInteger('exam_type');
            $table->unsignedBigInteger('quiz_type')->nullable();
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
        Schema::dropIfExists('quiz_details');
    }
};
