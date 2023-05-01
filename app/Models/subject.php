<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class subject extends Model
{
    use HasFactory;
    protected $fillable= ['subject_name', 'user_id', 'darasa_id', 'created_by'];
    protected  $table= 'subject';

    public function darasa(){
        return $this->belongsTo(darasa::class);
    }
}
