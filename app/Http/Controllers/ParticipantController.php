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

        return view("participants.index", compact("participants"));
    }
}
