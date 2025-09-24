<?php

namespace App\Http\Controllers;

use App\Models\Training;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class RecommenderController extends Controller
{
    public function getRecommendations(Request $request)
    {
        // Example: get survey inputs from the request
        $survey = [
            'category' => $request->input('category', 'AI & Machine Learning'),
            'platform_used' => $request->input('platform_used', 'Online'),
            'level' => $request->input('level', 'Beginner'),
        ];

        // Call FastAPI (feature-based) - USE 127.0.0.1 instead of localhost
        $response = Http::timeout(30)->post("http://127.0.0.1:8000/recommend/", $survey);

        if ($response->successful()) {
            $data = $response->json();
            $recommendedTrainings = collect($data['recommendations'])
            ->unique(fn($item) => strtolower($item['Course Title']));

            // Optional: fetch more details from your DB if needed
            $trainingIds = Training::whereIn('course_title', $recommendedTrainings->pluck('Course Title'))->pluck('id');
            $trainings = Training::whereIn('id', $trainingIds)->get();

            return view('recommendations', [
                'trainings' => $trainings,
                'raw_recommendations' => $recommendedTrainings,
            ]);
        }

        return response()->json(['error' => 'Unable to fetch recommendations'], 500);
    }
}