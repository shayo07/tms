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
        Schema::create('schoolscheme', function (Blueprint $table) {
            $table->id();
            $table->string('slug')->unique();
            $table->unsignedBigInteger('term_id');
            $table->string('scheme_name');
            $table->string('year');
            $table->string('is_active')->default(1);
            $table->unsignedBigInteger('darasa_id');
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->foreign('term_id')->references('id')->on('term')->onDelete('cascade');
            $table->foreign('class_id')->references('id')->on('darasa')->onDelete('cascade');
            $table->bigInteger('created_by');
            $table->timestamp('created_at')->useCurrent();
            $table->bigInteger('updated_by')->nullable();
            $table->timestamp('updated_at')->nullable();
            $table->bigInteger('deleted_by')->nullable();
            $table->timestamp('deleted_at')->nullable();
        });

        Schema::create('scheme', function (Blueprint $table){
            $table->id();
            $table->string('slug')->unique();
            $table->unsignedBigInteger('school_scheme_id');
            $table->string('competence');
            $table->string('objectives');
            $table->string('month');
            $table->string('week');
            $table->string('main_topic');
            $table->string('sub_topic');
            $table->string('periods');
            $table->string('teaching_activities');
            $table->string('learning_activities');
            $table->string('references');
            $table->string('teaching_aids');
            $table->string('assesments');
            $table->string('remarks');
            $table->bigInteger('created_by');
            $table->timestamp('created_at')->useCurrent();
            $table->bigInteger('updated_by')->nullable();
            $table->timestamp('updated_at')->nullable();
            $table->bigInteger('deleted_by')->nullable();
            $table->timestamp('deleted_at')->nullable();
            $table->foreign('school_scheme_id')->references('id')->on('schoolscheme')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('schoolscheme');
    }
};
