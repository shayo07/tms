<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class School_journal extends Model
{
    use HasFactory;

    protected $table = 'school_journal';
    protected $fillable = ['slug', 'journal_name', 'darasa_id', 'term_id', 'day', 'date', 'user_id', 'created_by', 'is_active'];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function term(){
        return $this->belongsTo(term::class);
    }

    public function darasa(){
        return $this->belongsTo(darasa::class);
    }

    public function journals(){
        return $this->hasMany(Journal::class);
    }

    public function journal_reports(){
        return $this->hasMany(Journal_Report::class);
    }
}
