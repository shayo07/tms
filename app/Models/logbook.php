<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class logbook extends Model
{
    use HasFactory;

    protected $fillable= ['slug', 'schoollogbook_id', 'week_number', 'month_number', 'main_topic', 'sub_topic', 'time_start',
        'time_finish', 'concept_covered', 'teachers_comment', 'headofdepartment_comment', 'headteachers_comment', 'created_by'];

    protected $table= 'logbook';

    public function school_logbook(){
        return $this->belongsTo(schoollogbook::class);
    }

}
