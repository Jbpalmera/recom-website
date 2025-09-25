<?php

namespace App\Http\Controllers;

use App\Models\Training;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class EventRegistrationController extends Controller
{
    // Show join form for an event
    public function create(Request $request, $eventId)
    {
        $user = Auth::user();

        // Try to fetch the event from the database
        $event = Training::with('category')->find($eventId);

        if ($event) {
            // Event exists in the database
            $category_id = $event->category_id;
            $level = $event->level;
            $courseTitle = $event->course_title;
        } else {
            // Event comes from the trained model (FastAPI)
            // Extract info from query params
            $categoryName = $request->query('category'); // string from model
            $level = $request->query('level');
            $courseTitle = $request->query('course_title');

            // Get category_id based on category name
            $category = \App\Models\Category::where('category_name', $categoryName)->first();
            $category_id = $category ? $category->id : null;

            // Create a temporary event object for the view
            $event = (object)[
                'id' => $eventId,
                'category_id' => $category_id,
                'level' => $level,
                'course_title' => $courseTitle,
                'category_name' => $categoryName,
            ];
        }

        return view('events.join', compact('event', 'user', 'category_id', 'level', 'courseTitle'));
    }
}
