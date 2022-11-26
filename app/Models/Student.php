<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;


class Student extends Authenticatable
{
    use HasFactory;
    public function user (){
        return $this->morphOne(User::class , 'actor' , 'actor_type' , 'actor_id' , 'id');
}




}
