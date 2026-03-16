<?php

use App\Http\Controllers\FileController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ParticipantController;
use App\Http\Controllers\StudentController;
use Illuminate\Support\Facades\Route;








// Route::view("/student", "student.index");



Route::get("/", [HomeController::class, "index"]);

// * participants

Route::get("/participants", [ParticipantController::class, "index"])->name("participant");
Route::post("/participant/store", [ParticipantController::class, "store"])->name("participant.store");
Route::get("/particpant/show/{participant}", [ParticipantController::class, "show"])->name("participant.show");



// * student concept


Route::get("/student" , [StudentController::class , "index"])->name("student");
Route::post("/student/store" , [StudentController::class , "store"]);
Route::get("/student/{student}/show/" , [StudentController::class , "show"])->name("student.show");
Route::delete("/student/destroy/{student}" , [StudentController::class , "destroy"])->name("student.destroy");
Route::put("/student/{student}/update" , [StudentController::class , "update"]);



// *  images 

Route::get("/images-crud" , [FileController::class  , "index"])->name("files.index");
Route::post("/images/store" , [FileController::class  , "store"])->name("files.store");

