<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Spatie\Permission\Traits\HasRoles;

class Teacher extends Authenticatable
{
    use HasFactory ,HasRoles;

    public function getFullNameAttribute()
    {
        return $this->user->first_name . " " . $this->user->last_name;
    }
    public function getImagesAttribute()
    {
        return $this->image;
    }
    
    public function user (){
        return $this->morphOne(User::class , 'actor' , 'actor_type' , 'actor_id' , 'id');
}


        public function subjects(){
            return $this->belongsToMany(Subject::class,'subject_teachers','subject_id','teacher_id');
        }
}
