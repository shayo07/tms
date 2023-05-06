<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lesson_evaluation extends Model
{
    use HasFactory;

    protected $table = 'lesson_evaluation';
    protected $fillable = ['slug', 'lessondevelopment_id', 'student_evaluation', 'teachers_evaluation', 'remarks', 'created_by'];

    public function lessondevelopment(){
        return $this->belongsTo(Lessondevelopment::class);
    }
}
