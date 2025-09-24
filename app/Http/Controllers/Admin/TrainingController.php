<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Training;

class TrainingController extends Controller
{
    // List all events
    public function index()
    {
        $trainings = Training::latest()->paginate(10); // paginate if needed
        return view('admin.events.index', compact('trainings'));
    }

    // Show edit form
    public function edit($id)
    {
        $training = Training::findOrFail($id);
        return view('admin.events.edit', compact('training'));
    }

    // Update an event
    public function update(Request $request, $id)
    {
        $training = Training::findOrFail($id);

        $request->validate([
            'course_title' => 'required|string|max:255',
            'platform_used' => 'nullable|string|max:255',
            'course_description' => 'nullable|string',
            'resource_person' => 'nullable|string|max:255',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
        ]);

        $training->update($request->all());

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
