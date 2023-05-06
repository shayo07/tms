<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SchoolAttendance extends Model
{
    use HasFactory;
    protected $table = 'school_attendance';
    protected $fillable = ['slug', 'term_id', 'darasa_id', 'attendance_name', 'user_id', 'created_by', 'is_active'];

    public function term(){
        return $this->belongsTo(term::class);
    }

    public function darasa(){
        return $this->belongsTo(darasa::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function attendances(){
        return $this->hasMany(Attendance::class);
    }

    public function scopeActive()
    {
        return $this->where('is_active', 1);
    }
}
