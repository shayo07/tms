<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{
    use HasFactory;
    protected  $table = 'attendance';
    protected $fillable = ['slug', 'school_attendance_id', 'student_id', 'status', 'date', 'created_by'];

    public  function school_attendance(){
        return $this->belongsTo(SchoolAttendance::class);
    }

    public function student(){
        return $this->belongsTo(student::class);
    }
}
