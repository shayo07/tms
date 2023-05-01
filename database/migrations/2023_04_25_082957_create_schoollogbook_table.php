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
        Schema::create('schoollogbook', function (Blueprint $table) {
            $table->id();
            $table->string('slug')->unique();
            $table->unsignedBigInteger('term_id');
            $table->string('log_name');
            $table->string('year');
            $table->unsignedBigInteger('darasa_id');
            $table->boolean('is_active')->default(0);
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->bigInteger('created_by');
            $table->timestamp('created_at')->useCurrent();
            $table->bigInteger('updated_by')->nullable();
            $table->timestamp('updated_at')->nullable();
            $table->bigInteger('deleted_by')->nullable();
            $table->timestamp('deleted_at')->nullable();
            $table->foreign('term_id')->references('id')->on('term')->onDelete('cascade');
            $table->foreign('darasa_id')->references('id')->on('darasa')->onDelete('cascade');


        });

        Schema::create('logbook', function (Blueprint $table){
            $table->id();
            $table->string('slug')->unique();
            $table->unsignedBigInteger('school_logbook_id');
            $table->string('week_number');
            $table->string('month_number');
            $table->string('main_topic');
            $table->string('sub_topic');
            $table->date('time_start');
            $table->date('time_finish');
            $table->string('concept_covered');
            $table->string('teachers_comment')->nullable();
            $table->string('headofdepartment_comment')->nullable();
            $table->string('headteachers_comment')->nullable();
            $table->bigInteger('created_by');
            $table->timestamp('created_at')->useCurrent();
            $table->bigInteger('updated_by')->nullable();
            $table->timestamp('updated_at')->nullable();
            $table->bigInteger('deleted_by')->nullable();
            $table->timestamp('deleted_at')->nullable();
            $table->foreign('school_logbook_id')->references('id')->on('schoollogbook')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('schoollogbook');
    }
};
