<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    //


    protected $fillable = ["post" , "student_id"];




    public function student() {

    return $this->belongsTo(Student::class);
    }
}
