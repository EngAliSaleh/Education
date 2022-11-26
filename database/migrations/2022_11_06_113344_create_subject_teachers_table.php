<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSubjectTeachersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('subject_teachers', function (Blueprint $table) {
            $table->id();
            
            $table->foreignId('subject_id');
            $table->foreign('subject_id')->on('subjects')->references('id')->cascadeOnDelete();

            $table->foreignId('teacher_id');
            $table->foreign('teacher_id')->on('teachers')->references('id')->cascadeOnDelete();
           
           
           
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
        Schema::dropIfExists('subject_teachers');
    }
}
