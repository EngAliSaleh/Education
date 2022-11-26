<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    use HasFactory;
    public function courses(){
        return $this->hasMany(Course::class,'subject_id','id');
    }

    public function teachers(){
        return $this->belongsToMany(Teacher::class,'subject_teachers','subject_id','teacher_id');
    }
    
}
