<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CaseStudy extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('case_study', function (Blueprint $table) {
            $table->id();
            $table->string('link');
            $table->binary('question');
            $table->binary('anwsers');
            $table->integer('teachher_id')->references('id')->on('teacher')->onDelete('cascade');
            $table->integer('student_id')->references('id')->on('student');
            $table->timestamp('created_at')->nullable();

   
        });
    }
    

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
