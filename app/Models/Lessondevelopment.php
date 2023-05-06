<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lessondevelopment extends Model
{
    use HasFactory;

    protected $table = 'lessondevelopment';

    protected  $fillable = ['slug', 'term_id', 'name', 'user_id', 'darasa_id', 'created_by', 'is_active'];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function term(){
        return $this->belongsTo(term::class);
    }

    public function darasa(){
        return $this->belongsTo(darasa::class);
    }

    public function lesson_plan(){
        return $this->hasMany(Lesson_plan::class);
    }

    public function lesson_dev(){
        return $this->hasMany(Lesson_dev::class);
    }

    public function lesson_evaluation(){
        return $this->hasMany(Lesson_evaluation::class);
    }
}
