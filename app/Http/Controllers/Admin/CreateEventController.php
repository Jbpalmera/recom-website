<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Training;
use App\Models\Category;
use Illuminate\Http\Request;

class CreateEventController extends Controller
{
    /**
     * Show the create event form
     */
    public function create()
    {
        // ✅ Fetch all categories to populate the dropdown
        $categories = Category::all();

        // ✅ Pass categories to the view
        return view('admin.events.createEvents', compact('categories'));
    }

    /**
     * Store the new event
     */
    public function store(Request $request)
    {
        // ✅ Validate all fields including category_id
        $validated = $request->validate([
            'course_title'       => 'required|string|max:255',
            'course_description' => 'nullable|string',
            'platform_used'      => 'required|string|max:255',
            'category_id'        => 'required|exists:categories,id', // 👈 ensures category exists
            'level'              => 'required|string|in:Beginner,Intermediate,Advanced',
            'start_date'         => 'required|date',
            'end_date'           => 'nullable|date|after_or_equal:start_date',
            'start_time'         => 'required|date_format:H:i',
            'end_time'           => 'required|date_format:H:i|after_or_equal:start_time',
            'resource_person'    => 'nullable|string|max:255',
        ]);

        // ✅ Store the new training record
        Training::create($validated);

        // ✅ Redirect back to events list with success message
        return redirect()->route('admin.viewEvents')
            ->with('success', 'Event created successfully!');
    }
}
