<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    //


    public function index()
    {

        $fullName = "boujem3a";
        $age = 25;

        

        return view("home.home" , compact("fullName" , "age"));
    }
}
