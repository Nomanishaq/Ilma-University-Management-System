<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('quiz', function (Blueprint $table) {
            $table->unsignedInteger('faculty_id')->nullable();
            $table->unsignedInteger('program_id')->nullable();
            $table->unsignedInteger('session_id')->nullable();
            $table->unsignedInteger('semester_id')->nullable();
            $table->unsignedInteger('section_id')->nullable();

            $table->string('teacher')->nullable();
            $table->string('exam_time')->nullable();
            $table->enum('exam_type', ['quiz', 'mid_term', 'final_term', 'assignment', 'class_participation'])->nullable();
            $table->enum('quiz_type', ['quiz_1', 'quiz_2'])->nullable();

            // Adding foreign key constraints
            $table->foreign('faculty_id')->references('id')->on('faculties')->onDelete('cascade');
            $table->foreign('program_id')->references('id')->on('programs')->onDelete('cascade');
            $table->foreign('session_id')->references('id')->on('sessions')->onDelete('cascade');
            $table->foreign('semester_id')->references('id')->on('semesters')->onDelete('cascade');
            $table->foreign('section_id')->references('id')->on('sections')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::table('quiz', function (Blueprint $table) {
            // Dropping foreign key constraints
            $table->dropForeign(['faculty_id']);
            $table->dropForeign(['program_id']);
            $table->dropForeign(['session_id']);
            $table->dropForeign(['semester_id']);
            $table->dropForeign(['section_id']);
            $table->dropForeign(['subject_id']);

            // Dropping columns
            $table->dropColumn([
                'faculty_id',
                'program_id',
                'session_id',
                'semester_id',
                'section_id',
                'subject_id',
                'teacher',
                'exam_time',
                'exam_type',
                'quiz_type',
            ]);
        });
    }
};
