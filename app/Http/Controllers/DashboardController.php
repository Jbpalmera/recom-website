<?php

namespace App\Http\Controllers;

use App\Http\Controllers\RecommenderController;
use Illuminate\Support\Facades\Auth;
use App\Models\Training;

class DashboardController extends Controller
{
    public function index()
    {
        // All events/trainings
        $events = Training::orderBy('end_date', 'desc')->get()->unique('course_title');

        $userId = Auth::id();
      

        return view('user.dashboard', compact('events'));
    }
}
