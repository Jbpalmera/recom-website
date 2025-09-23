<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Training; // Make sure to import your Event model

class DashboardController extends Controller
{
    public function index()
    {
        $events = Training::all(); // Get events from database
        
        return view('dashboard', compact('events')); // Pass events to view
    }
}