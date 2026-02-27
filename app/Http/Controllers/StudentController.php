<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StudentController extends Controller
{
    //


    public function index()
    {


        $fullName = "mehdi forkani";
        $age = 25;
        

        return view("student.index" , compact("fullName" , "age"));
    }
}
