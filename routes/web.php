<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ParticipantController;
use App\Http\Controllers\StudentController;
use Illuminate\Support\Facades\Route;









Route::get("/student",  [StudentController::class, "index"]);


Route::get("/" , [HomeController::class , "index"]);


Route::get("/participants" , [ParticipantController::class , "index"])->name("participant");
Route::post("/participant/store" , [ParticipantController::class , "store"])->name("participant.store");