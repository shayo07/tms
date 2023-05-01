<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('lessondevelopment', function (Blueprint $table) {
            $table->id();
            $table->string('slug')->unique();
            $table->unsignedBigInteger('term_id');
            $table->string('name');
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->unsignedBigInteger('class');
            $table->bigInteger('created_by');
            $table->timestamp('created_at')->useCurrent();
            $table->bigInteger('updated_by')->nullable();
            $table->timestamp('updated_at')->nullable();
            $table->bigInteger('deleted_by')->nullable();
            $table->timestamp('deleted_at')->nullable();
            $table->foreign('term_id')->references('id')->on('term')->onDelete('cascade');
            $table->foreign('class')->references('id')->on('darasa')->onDelete('cascade');
        });


        Schema::create('lesson_plan', function (Blueprint $table){
            $table->id();
            $table->string('slug')->unique();
            $table->unsignedBigInteger('lessondevelopment');
            $table->string('periods');
            $table->string('time');
            $table->string('boys_registered');
            $table->string('girls_registered');
            $table->string('boys_present');
            $table->string('girls_present');
            $table->string('competence');
            $table->string('topic');
            $table->string('sub_topic');
            $table->string('general_objectives');
            $table->string('specific_objectives');
            $table->string('teachers_learning_material');
            $table->string('reference');
            $table->bigInteger('created_by');
            $table->timestamp('created_at')->useCurrent();
            $table->bigInteger('updated_by')->nullable();
            $table->timestamp('updated_at')->nullable();
            $table->bigInteger('deleted_by')->nullable();
            $table->timestamp('deleted_at')->nullable();
            $table->foreign('lessondevelopment')->references('id')->on('lessondevelopment')->onDelete('cascade');
        });

        Schema::create('lesson_dev', function (Blueprint $table){
            $table->id();
            $table->string('slug')->unique();
            $table->unsignedBigInteger('lessondevelopment');
            $table->string('stage');
            $table->string('time');
            $table->string('teaching_activities');
            $table->string('learning_activities');
            $table->string('assessment');
            $table->bigInteger('created_by');
            $table->timestamp('created_at')->useCurrent();
            $table->bigInteger('updated_by')->nullable();
            $table->timestamp('updated_at')->nullable();
            $table->bigInteger('deleted_by')->nullable();
            $table->timestamp('deleted_at')->nullable();
            $table->foreign('lessondevelopment')->references('id')->on('lessondevelopment')->onDelete('cascade');
        });

        Schema::create('lesson_evaluation', function (Blueprint $table){
            $table->id();
            $table->string('slug')->unique();
            $table->unsignedBigInteger('lessondevelopment');
            $table->string('student_evaluation');
            $table->string('teachers_evaluation');
            $table->string('remarks');
            $table->bigInteger('created_by');
            $table->timestamp('created_at')->useCurrent();
            $table->bigInteger('updated_by')->nullable();
            $table->timestamp('updated_at')->nullable();
            $table->bigInteger('deleted_by')->nullable();
            $table->timestamp('deleted_at')->nullable();
            $table->foreign('lessondevelopment')->references('id')->on('lessondevelopment')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('lessondevelopment');
    }
};
