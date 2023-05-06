<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class darasa extends Model
{
    use HasFactory;

    protected $table= 'darasa';

    protected  $fillable = ['class_name', 'class_capacity', 'is_active', 'user_id',
        'created_by'];

    public function darasa(){
        return $this->hasMany(darasa::class);
    }

    public function subject(){
        return $this->hasMany(Subject::class);
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
