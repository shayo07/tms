<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class scheme extends Model
{
    use HasFactory;

    protected $table = 'scheme';

    protected $fillable = ['slug', 'schoolScheme_id ', 'competence', 'objectives', 'month', 'week', 'main_topic',
        'sub_topic', 'periods', 'teaching_activities', 'learning_activities', 'references', 'teaching_aids', 'assesments', 'remarks', 'created_by'];



    public function schoolscheme(){
        return $this->belongsTo(schoolscheme::class);
    }
}
