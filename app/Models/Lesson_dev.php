<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lesson_dev extends Model
{
    use HasFactory;
    protected $table = 'lesson_dev';
    protected $fillable = ['slug', 'lessondevelopment_id', 'stage', 'time', 'teaching_activities', 'learning_activities'
    , 'assessment', 'created_by'];

    public function lessondevelopment(){
        return $this->belongsTo(Lessondevelopment::class);
    }
}
