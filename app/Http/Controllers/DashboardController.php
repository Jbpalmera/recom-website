<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\Training;

class DashboardController extends Controller
{
    public function index()
    {
        // All events/trainings
        $events = Training::orderBy('end_date', 'desc')
            ->get()
            ->unique('course_title');

        return view('dashboard', compact('events'));
    }

    // New method to fetch recommended trainings based on scoring
    public function getRecommendations($id)
    {
        $training = Training::findOrFail($id);

        // Compute similarity score
        $recommended = Training::where('id', '!=', $training->id)
            ->get()
            ->map(function($t) use ($training) {
                $score = 0;
                if ($t->category === $training->category) $score += 3;
                if ($t->level === $training->level) $score += 2;
                if ($t->platform_used === $training->platform_used) $score += 1;
                $t->score = $score;
                return $t;
            })
            ->sortByDesc('score')
            ->take(5);

        // Fallback if no match found
        if ($recommended->isEmpty()) {
            $recommended = Training::where('id', '!=', $training->id)
                ->inRandomOrder()
                ->take(5)
                ->get();
        }

        return response()->json([
            'recommendations' => $recommended->values()
        ]);
    }
}
