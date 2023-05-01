<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class schoolscheme extends Model
{
    use HasFactory;

    protected $table = 'schoolscheme';

    protected $fillable = ['slug', 'term_id', 'scheme_name', 'user_id',
        'created_by', 'year', 'darasa_id', 'is_active'];

    public function term(){
        return $this->belongsTo(term::class);
    }

    public function scheme(){
        return $this->hasMany(scheme::class);
    }

    public function darasa(){
        return $this->belongsTo(darasa::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }
}
