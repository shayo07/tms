<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lesson_development extends Model
{
    use HasFactory;

    protected $table = 'lessondevelopment';

    protected  $fillable = ['slug', 'term_id', 'name', 'user_id', 'darasa_id', 'created_by', 'is_active'];

    public function users(){
        return $this->belongsTo(User::class);
    }

    public function term(){
        return $this->belongsTo(term::class);
    }

    public function darasa(){
        return $this->belongsTo(darasa::class);
    }
}
