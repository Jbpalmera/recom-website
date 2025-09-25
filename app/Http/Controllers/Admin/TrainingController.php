<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Training;
use App\Models\Category; // Add this import

class TrainingController extends Controller
{
    // List all events
    public function index()
    {
        $trainings = Training::latest()->paginate(10);
        return view('admin.events.index', compact('trainings'));
    }

    // Show edit form
    public function edit($id)
    {
        $training = Training::findOrFail($id);
        $categories = Category::all(); // Add this line - fetch categories for dropdown
        
        return view('admin.events.edit', compact('training', 'categories')); // Pass both variables
    }

    // Update an event
    public function update(Request $request, $id)
    {
        $training = Training::findOrFail($id);

        $validated = $request->validate([
            'course_title' => 'required|string|max:255',
            'course_description' => 'nullable|string',
            'platform_used' => 'required|string|max:255',
            'category_id' => 'required|exists:categories,id', // Add category validation
            'level' => 'required|string|in:Beginner,Intermediate,Advanced',
            'start_date' => 'required|date',
            'end_date' => 'nullable|date|after_or_equal:start_date',
            'start_time' => 'required|date_format:H:i',
            'end_time' => 'required|date_format:H:i|after_or_equal:start_time',
            'resource_person' => 'nullable|string|max:255',
        ]);

        $training->update($validated);

        return redirect()->route('admin.viewEvents')->with('success', 'Event updated successfully!');
    }

    // Delete an event
    public function destroy($id)
    {
        $training = Training::findOrFail($id);
        $training->delete();

        return redirect()->route('admin.viewEvents')->with('success', 'Event deleted successfully!');
    }
}