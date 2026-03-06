<?php

namespace App\Http\Controllers;

use App\Models\Participant;
use Illuminate\Http\Request;

class ParticipantController extends Controller
{
    //


    public function index()
    {

        $participants = Participant::all();

        // dd($participants);


        return view("participants.index", compact("participants"));
    }


    public function store(Request $request)
    {


        $request->validate([
            "name" => "required",
            "age" => "required",
            "phone" => "required",
            "cin" => "required",
        ]);



        Participant::create([

            "name" =>  $request->name,
            "age" =>  $request->age,
            "phone" =>  $request->phone,
            "cin" =>  $request->cin,
        ]);



        return redirect()->back();
    }

    public function show(Participant $participant)
    {


        return view("participants.show" , compact("participant") );
    }
}
