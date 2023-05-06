<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Journal extends Model
{
    use HasFactory;
    protected $table = 'journal';
    protected $fillable = ['slug', 'school_journal_id', 'session', 'subject_id',
        'concept_covered', 'teachers_comment', 'created_by'];

    public function school_journal(){
        return $this->belongsTo(School_journal::class);
    }

    public function subject(){
        return $this->belongsTo(subject::class);
    }

}
