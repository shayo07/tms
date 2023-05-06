<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class subject extends Model
{
    use HasFactory;
    protected $fillable= ['slug', 'subject_name', 'user_id', 'darasa_id', 'is_active', 'created_by'];
    protected  $table= 'subject';

    public function darasa(){
        return $this->belongsTo(darasa::class);
    }

    public function journal(){
        return $this->hasMany(Journal::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function term(){
        return $this->belongsTo(term::class);
    }
}
