<?php

namespace App\Http\Controllers;

use App\Models\Training;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class EventController extends Controller
{
    public function index()
    {
        // Show all events, grouped by resource person
        $events = Training::orderBy('end_date', 'desc')
            ->get()
            ->unique('resource_person');

        return view('events', compact('events'));
    }

    public function show($id)
    {
        // 1️⃣ Get the clicked event
        $event = Training::with('category')->findOrFail($id);

        // 2️⃣ Prepare the payload for FastAPI
        $payload = [
            'id'              => $event->id,
            'course_title' => $event->course_title, 
            'category'     => $event->category->category_name ?? null,
            'level'        => $event->level ?? null,
            'resource_person_name' => $event->resource_person,
            'top_n'        => 6,
        ];


        // 3️⃣ Call FastAPI recommender
        $recommendations = [];
        try {
            $response = Http::timeout(30)
                ->acceptJson()
                ->post('http://127.0.0.1:8000/recommend/', $payload);

            if ($response->failed()) {
                // Debug FastAPI response if failed
                logger()->error('FastAPI error', [
                    'status' => $response->status(),
                    'body' => $response->body()
                ]);
            } else {
                $data = $response->json();
                $recommendations = $data['recommendations'] ?? [];
            }
        } catch (\Exception $e) {
            // Catch connection errors
            logger()->error('FastAPI connection error: ' . $e->getMessage());
        }

        return view('events.showInfo', [
            'event' => $event,
            'recommendations' => $recommendations,
            'payload' => $payload 
        ]);
    }
    public function showByTitle($title)
{
    // decode URL back to normal string
    $decodedTitle = urldecode($title);

    // find training by course_title
    $event = Training::with('category')
        ->where('course_title', $decodedTitle)
        ->firstOrFail();

    // Prepare payload for FastAPI (like in show())
    $payload = [
        'id'              => $event->id,
        'course_title'    => $event->course_title,
        'category'        => $event->category->category_name ?? null,
        'level'           => $event->level ?? null,
        'resource_person_name' => $event->resource_person,
        'top_n'           => 6,
    ];

    // Call FastAPI recommender (same logic as show())
    $recommendations = [];
    try {
        $response = \Illuminate\Support\Facades\Http::timeout(30)
            ->acceptJson()
            ->post('http://127.0.0.1:8000/recommend/', $payload);

        if ($response->successful()) {
            $data = $response->json();
            $recommendations = $data['recommendations'] ?? [];
        }
    } catch (\Exception $e) {
        \Log::error('FastAPI connection error: ' . $e->getMessage());
    }

    return view('events.showInfo', [
        'event' => $event,
        'recommendations' => $recommendations,
        'payload' => $payload,
    ]);
}
 public function showByExternalId($external_id)
    {
        $training = Training::where('external_id', $external_id)->firstOrFail();

        return view('events.showInfo', ['event' => $training]);

    }


    // Show the form page
public function showJoinForm($eventId)
{
    $event = Event::findOrFail($eventId);
    return view('events.join', compact('event'));
}

// Process the submitted form



}
