<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class classes extends Model
{
    use HasFactory;
    protected  $table = 'classes';
    protected $fillable= ['student', 'class'];

    public function darasa(){
        return $this->belongsTo(darasa::class);
    }

    public  function student(){
        return $this->belongsTo(student::class);
    }
}
