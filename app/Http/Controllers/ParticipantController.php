<?php

namespace App\Http\Controllers;

use App\Models\Participant;
use Illuminate\Http\Request;

class ParticipantController extends Controller
{
    //


    public function index()
    {

        $participants = Participant::where("age" , "23")->get();

        // dd($participants);


        return view("participants.index", compact("participants"));
    }
}
