<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Journal_Report extends Model
{
    use HasFactory;
    protected $table = 'journal_report';

    protected $fillable = ['slug', 'school_journal_id', 'periods_taught', 'periods_not_taught', 'reason_for_not_taught',
        'class_teacher_comment', 'admin_teacher_comment', 'super_admin_teacher_comment', 'created_by'];

    public function school_journal(){
        return $this->belongsTo(School_journal::class);
    }
}
