<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Training;
use Illuminate\Http\Request; // Your events/training model

class CreateEventController extends Controller
{
    // Show the create event form
    public function create()
    {
        // Make sure to return the view inside the admin folder
        return view('admin.createEvents');
    }

    // Store the new event
    public function store(Request $request)
    {
        $validated = $request->validate([
            'course_title' => 'required|string|max:255',
            'course_description' => 'nullable|string',
            'platform_used' => 'required|string|max:255',
            'category' => 'required|string|max:255',
            'level' => 'required|string|in:Beginner,Intermediate,Advanced',
            'start_date' => 'required|date',
            'end_date' => 'nullable|date|after_or_equal:start_date',
            'start_time' => 'required|date_format:H:i',
            'end_time' => 'required|date_format:H:i|after_or_equal:start_time',
            'resource_person' => 'nullable|string|max:255',
        ]);

        Training::create($validated);

        return redirect()->route('admin.viewEvents')
            ->with('success', 'Event created successfully!');
    }
}
