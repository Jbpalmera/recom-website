<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class RecommenderController extends Controller
{
    public function getRecommendations(Request $request)
    {
        // Get course title from request or use fallback
        $courseTitle = $request->input('course_title', 'Introduction to AI');

        // Call FastAPI recommender
        $response = Http::timeout(30)->post('http://127.0.0.1:8000/recommend/', [
            'course_title' => $courseTitle,
            'top_n' => 5,
        ]);

        if ($response->successful()) {
            $data = $response->json();
            $recommendedTitles = collect($data['recommendations'])->pluck('Course Title');

            return view('recommendations', [
                'trainings' => collect($data['recommendations']), // Directly show recommended courses
            ]);

        }

        return response()->json(['error' => 'Unable to fetch recommendations'], 500);
    }
}
