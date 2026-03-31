<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    //

    protected $fillable = ["name", "email", "birthday", "training", "policy", "progress", "gender"];






    public function posts()
    {

        return $this->hasMany(Post::class);
    }



    public function courses()
    {


        return $this->belongsToMany(Course::class)->withPivot("course_student");
    }
}
