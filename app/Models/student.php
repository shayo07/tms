<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class student extends Model
{
    use HasFactory;
    protected $table= 'student';
    protected  $fillable = ['firstname', 'middlename', 'lastname','slug', 'term_id',
        'age', 'gender', 'parent_emailaddress', 'home_address', 'created_by', 'is_active' ];

    public function classrooms(){
        return $this->hasMany(classes::class);
    }

    public function subject(){
        return $this->hasMany(subject::class);
    }

    public function attendance(){
        return $this->hasMany(Attendance::class);
    }

    public function getNameAttribute()
    {
        return $this->firstname." ".$this->middlename." ".$this->lastname;
    }
}
