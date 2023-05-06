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
        Schema::create('school_journal', function (Blueprint $table) {
            $table->id();
            $table->string('slug')->unique();
            $table->string('journal_name');
            $table->unsignedBigInteger('darasa_id');
            $table->unsignedBigInteger('term_id');
            $table->string('day');
            $table->date('date')->useCurrent();
            $table->foreign('darasa_id')->references('id')->on('darasa')->onDelete('cascade');
            $table->foreign('term_id')->references('id')->on('term')->onDelete('cascade');
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->string('is_active')->default(1);
            $table->bigInteger('created_by');
            $table->timestamp('created_at')->useCurrent();
            $table->bigInteger('updated_by')->nullable();
            $table->timestamp('updated_at')->nullable();
            $table->bigInteger('deleted_by')->nullable();
            $table->timestamp('deleted_at')->nullable();
        });



        Schema::create('journal', function (Blueprint $table) {
            $table->id();
            $table->string('slug')->unique();
            $table->unsignedBigInteger('school_journal_id');
            $table->string('session');
            $table->unsignedBigInteger('subject_id');
            $table->string('concept_covered');
            $table->string('teachers_comment');
            $table->foreign('school_journal_id')->references('id')->on('school_journal')->onDelete('cascade');
            $table->foreign('subject_id')->references('id')->on('subject')->onDelete('cascade');
            $table->bigInteger('created_by');
            $table->timestamp('created_at')->useCurrent();
            $table->bigInteger('updated_by')->nullable();
            $table->timestamp('updated_at')->nullable();
            $table->bigInteger('deleted_by')->nullable();
            $table->timestamp('deleted_at')->nullable();
        });

        Schema::create('journal_report', function (Blueprint $table){
            $table->id();
            $table->string('slug')->unique();
            $table->unsignedBigInteger('school_journal_id');
            $table->string('periods_taught');
            $table->string('periods_not_taught');
            $table->string('reason_for_not_taught');
            $table->string('class_teacher_comment');
            $table->string('admin_teacher_comment');
            $table->string('super_admin_teacher_comment');
            $table->bigInteger('created_by');
            $table->timestamp('created_at')->useCurrent();
            $table->bigInteger('updated_by')->nullable();
            $table->timestamp('updated_at')->nullable();
            $table->bigInteger('deleted_by')->nullable();
            $table->timestamp('deleted_at')->nullable();
            $table->foreign('school_journal_id')->references('id')->on('school_journal')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('schooljournal');
    }
};
