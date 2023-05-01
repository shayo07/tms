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
        Schema::create('schoolattendance', function (Blueprint $table) {
            $table->id();
            $table->string('slug');
            $table->unsignedBigInteger('term_id');
            $table->string('attendance_name');
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->bigInteger('created_by');
            $table->timestamp('created_at')->useCurrent();
            $table->bigInteger('updated_by')->nullable();
            $table->timestamp('updated_at')->nullable();
            $table->bigInteger('deleted_by')->nullable();
            $table->timestamp('deleted_at')->nullable();
            $table->foreign('term_id')->references('id')->on('term')->onDelete('cascade');
        });

        Schema::create('attendance', function (Blueprint $table){
            $table->id();
            $table->string('slug');
            $table->unsignedBigInteger('attendance_id');
            $table->unsignedBigInteger('student_id');
            $table->string('status');
            $table->date('date');
            $table->bigInteger('created_by');
            $table->timestamp('created_at')->useCurrent();
            $table->bigInteger('updated_by')->nullable();
            $table->timestamp('updated_at')->nullable();
            $table->bigInteger('deleted_by')->nullable();
            $table->timestamp('deleted_at')->nullable();
            $table->foreign('attendance_id')->references('id')->on('schoolattendance')->onDelete('cascade');
            $table->foreign('student_id')->references('id')->on('student')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('schoolattendance');
    }
};
