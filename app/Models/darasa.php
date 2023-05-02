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
        return $this->hasMany(subject::class);
    }

    public function schoolscheme(){
        return $this->hasMany(schoolscheme::class);
    }

    public function lessondevelopment(){
        return $this->hasMany(Lesson_development::class);
    }

}
