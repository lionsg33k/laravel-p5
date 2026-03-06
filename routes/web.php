<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ParticipantController;
use App\Http\Controllers\StudentController;
use Illuminate\Support\Facades\Route;








// Route::view("/student", "student.index");



Route::get("/", [HomeController::class, "index"]);


Route::get("/participants", [ParticipantController::class, "index"])->name("participant");
Route::post("/participant/store", [ParticipantController::class, "store"])->name("participant.store");
Route::get("/particpant/show/{participant}", [ParticipantController::class, "show"])->name("participant.show");



// * student concept


Route::get("/student" , [StudentController::class , "index"])->name("student");