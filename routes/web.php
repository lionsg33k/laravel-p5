<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\StudentController;
use Illuminate\Support\Facades\Route;









Route::get("/student",  [StudentController::class, "index"]);


Route::get("/" , [HomeController::class , "index"]);
