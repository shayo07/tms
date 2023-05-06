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
        Schema::create('subject', function (Blueprint $table) {
            $table->id();
            $table->string('slug')->unique();
            $table->string('subject_name');
            $table->integer('is_active');
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->unsignedBigInteger('darasa_id');
            $table->foreign('darasa_id')->references('id')->on('darasa')->onDelete('cascade');
            $table->bigInteger('created_by');
            $table->timestamp('created_at')->useCurrent();
            $table->bigInteger('updated_by')->nullable();
            $table->timestamp('updated_at')->nullable();
            $table->bigInteger('deleted_by')->nullable();
            $table->timestamp('deleted_at')->nullable();
        });

        Schema::create('studentSubjects', function (Blueprint $table) {
        $table->id();
        $table->string('slug')->unique();
        $table->unsignedBigInteger('subject_id');
        $table->unsignedBigInteger('student_id');
        $table->unsignedBigInteger('darasa_id');
        $table->foreign('darasa_id')->references('id')->on('darasa')->onDelete('cascade');
        $table->foreign('student_id')->references('id')->on('student')->onDelete('cascade');
        $table->foreign('subject_id')->references('id')->on('subject')->onDelete('cascade');
        $table->bigInteger('created_by');
        $table->timestamp('created_at')->useCurrent();
        $table->bigInteger('updated_by')->nullable();
        $table->timestamp('updated_at')->nullable();
        $table->bigInteger('deleted_by')->nullable();
        $table->timestamp('deleted_at')->nullable();
    });

        Schema::create('subjectsResult', function (Blueprint $table) {
            $table->id();
            $table->string('slug')->unique();
            $table->unsignedBigInteger('studentSubject_id');
            $table->unsignedBigInteger('student_id');
            $table->unsignedBigInteger('darasa_id');
            $table->foreign('darasa_id')->references('id')->on('darasa')->onDelete('cascade');
            $table->foreign('student_id')->references('id')->on('student')->onDelete('cascade');
            $table->foreign('studentSubject_id')->references('id')->on('studentSubjects')->onDelete('cascade');
            $table->bigInteger('created_by');
            $table->timestamp('created_at')->useCurrent();
            $table->bigInteger('updated_by')->nullable();
            $table->timestamp('updated_at')->nullable();
            $table->bigInteger('deleted_by')->nullable();
            $table->timestamp('deleted_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('subject');
    }
};
