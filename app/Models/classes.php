<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class classes extends Model
{
    use HasFactory;
    protected  $table = 'classes';
    protected $fillable= ['student_id', 'darasa_id', 'term_id', 'slug', 'created_by'];

    public function darasa(){
        return $this->belongsTo(darasa::class);
    }

    public  function student(){
        return $this->belongsTo(student::class);
    }

    public function term(){
        return $this->belongsTo(term::class);
    }

}
