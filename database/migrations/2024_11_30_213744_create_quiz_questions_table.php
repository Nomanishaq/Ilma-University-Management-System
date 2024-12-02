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
        Schema::create('quiz_questions', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('quiz_id'); // Foreign key column
            $table->string('question_type');
            $table->string('question')->nullable();
            $table->string('options')->nullable();
            $table->string('clo')->nullable();
            $table->string('plo')->nullable();
            $table->integer('total_marks')->nullable();
            $table->string('cognitive')->nullable();
            $table->string('psychomotor')->nullable();
            $table->string('affective')->nullable();
            $table->timestamps();
        
            // Adding foreign key constraint
            $table->foreign('quiz_id')
                  ->references('id')
                  ->on('quiz')
                  ->onDelete('cascade') // Optional: Cascade deletes
                  ->onUpdate('cascade'); // Optional: Cascade updates
        });
        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('quiz_questions');
    }
};
