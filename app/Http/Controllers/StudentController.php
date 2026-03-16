<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

use function Flasher\Prime\flash;

class StudentController extends Controller
{
    //

    public function  index()
    {

        $students = Student::all();

        // dd($students[0]->birthday->format("d-m-y"));

        return view("student.index", compact("students"));
    }


    public function create()
    {


        return view("stude");
    }

    public function store(Request $request)
    {

        $request->validate([
            "name" => "required",
            "email" => "unique:students,email",
            "birthday" => "date",
            "training" => "in:coding,lakhrin",
            // "policy" => "boolean",
            "progress" => "integer",
            "gender" => "in:male,female"
        ]);


        // dd($request->birthday);


        Student::create([
            "name" =>  $request->name,
            "email" =>  $request->email,
            "birthday" =>  $request->birthday,
            "training" =>  $request->training,
            "policy" =>  $request->policy == "on" ? true : false,
            "gender" =>  $request->gender,
            "progress" =>  $request->progress,
        ]);

        flash()->success("hhhh");
        return back();
    }


    public function show(Student $student)
    {


        return view("student.student_show", compact("student"));
    }

    public function edit()
    {

        return view("student.edit");
    }


    public function update(Request $request, Student $student)
    {

        $request->validate([
            "name" => "required",
            "email" => "unique:students,email,$student->id",
            "birthday" => "date",
            "training" => "in:coding,lakhrin",
            // "policy" => "boolean",
            "progress" => "integer",
            "gender" => "in:male,female"
        ]);


        // dd($request->birthday);


        $student->update([
            "name" =>  $request->name,
            "email" =>  $request->email,
            "birthday" =>  $request->birthday,
            "training" =>  $request->training,
            "policy" =>  $request->policy == "on" ? true : false,
            "gender" =>  $request->gender,
            "progress" =>  $request->progress,
        ]);

        return back()->with("success" , "Student Updated Successfully");
    }




    public function destroy(Student $student)
    {


        $student->delete();

        return back();
    }
}
