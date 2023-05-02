<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lesson_plan extends Model
{
    use HasFactory;

    protected $table = 'lesson_plan';
    protected $fillable= ['slug', 'lessondevelopment_id', 'periods', 'time', 'boys_registered', 'girls_registered', 'boys_present',
        'girls_present', 'competence', 'topic', 'sub_topic', 'general_objectives', 'specific_objectives', 'teachers_learning_material', 'reference', 'created_by'];

    public function lessondevelopment(){
        return $this->belongsTo(Lessondevelopment::class);
    }


}
