<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Qualification extends Model
{
    use HasFactory;
    
    public function exam()
    {

        return $this->hasOne('App\Models\Exam', 'id','exam_id');
    }
}
