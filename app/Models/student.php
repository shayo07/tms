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

    public function classes(){
        return $this->hasMany(classes::class);
    }

    public function subject(){
        return $this->hasMany(subject::class, 'student_id');
    }
}
