<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class schoollogbook extends Model
{
    use HasFactory;

    protected $table= 'schoollogbook';

    protected $fillable = ['slug', 'log_name', 'user_id', 'created_by', 'term_id', 'year', 'darasa_id', 'is_active'];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function logbooks(){
        return $this->hasMany(logbook::class);
    }

    public function term(){
        return $this->belongsTo(term::class);
    }

    public function darasa(){
        return $this->belongsTo(darasa::class);
    }
}
