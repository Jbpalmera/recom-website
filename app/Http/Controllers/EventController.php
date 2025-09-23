<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Training;

class EventController extends Controller
{
    public function index()
    {
        // Get all events
        $events = Training::all();

        // Keep only one event per resource person
        $events = Training::orderBy('end_date', 'desc')->get()->unique('resource_person');


        return view('events', compact('events'));
    }
}
