<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class term extends Model
{
    use HasFactory;
    protected $table = 'term';
    protected $fillable = ['slug','term_name', 'year', 'status', 'created_by', 'is_active'];

    public function student(){
        return $this->hasMany('student');
    }


    public function user(){
        return $this->hasMany(User::class);
    }

    public function schoollogbooks(){
        return $this->hasMany(schoollogbook::class);
    }

    public function schoolscheme(){
        return $this->hasMany(schoolscheme::class);
    }

    public function lessondevelopment(){
        return $this->hasMany(Lessondevelopment::class);
    }

    public function school_journal(){
        return $this->hasMany(School_journal::class);
    }

    public function classes(){
        return $this->hasMany(classes::class);
    }

    public function schoolattendance(){
        return $this->hasMany(School_Attendance::class);
    }




}
