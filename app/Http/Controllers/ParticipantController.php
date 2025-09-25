<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Participant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http; // For API calls

class ParticipantController extends Controller
{
    // Store participant info
    public function store(Request $request)
    {
        $validated = $request->validate([
            'first_name' => 'required|string|max:255',
            'middle_initial' => 'nullable|string|max:1',
            'last_name' => 'required|string|max:255',
            'name_extension' => 'nullable|string|max:10',
            'email' => 'required',
            'mobile_no' => 'nullable|string|max:20',
            'category_id' => 'required|integer',
            'level' => 'required|string',
            'course_title' => 'required|string|max:255',
        ]);

        $existingParticipant = Participant::where('user_id', Auth::id())
            ->where('course_title', $validated['course_title'])
            ->first();

        if ($existingParticipant) {
            return redirect()->back()->with('error', 'You are already registered for this course!');
        }

        try {
            $participant = Participant::create([
                'user_id' => Auth::id(),
                'first_name' => $validated['first_name'],
                'middle_initial' => $validated['middle_initial'],
                'last_name' => $validated['last_name'],
                'name_extension' => $validated['name_extension'],
                'email' => $validated['email'],
                'mobile_no' => $validated['mobile_no'],
                'course_title' => $validated['course_title'],
            ]);

            return redirect()->route('participants.success', [
                'id' => $participant->id,
                'category_id' => $validated['category_id'],
                'level' => $validated['level'],
                'course_title' => $validated['course_title'],
            ]);

        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Error registering as participant. Please try again.');
        }
    }

    // Show success page with recommendations
    public function success($participantId, Request $request)
    {
        $participant = Participant::findOrFail($participantId);

        $categoryId = $request->query('category_id');
        $level = $request->query('level');
        $courseTitle = $request->query('course_title');

        $category = Category::find($categoryId);

        // fetch recommendations
        $recommended = collect();
        if ($category) {
            $categoryName = ucwords(strtolower(trim($category->category_name)));
            $level = ucfirst(strtolower(trim($level)));

            try {
                $response = Http::post('http://127.0.0.1:8000/recommend/', [
                    'course_title' => '',
                    'category' => $categoryName,
                    'level' => $level,
                    'top_n' => 5,
                ]);

                if ($response->successful()) {
                    $recommended = collect($response->json()['recommendations'] ?? []);

                    // 🔹 Map category name to category_id for each recommended course
                    $recommended = $recommended->map(function ($rec) {
                        if (isset($rec['category'])) {
                            $cat = Category::where('category_name', $rec['category'])->first();
                            $rec['category_id'] = $cat ? $cat->id : null;
                        }
                        return $rec;
                    });
                }
            } catch (\Exception $e) {
                // ignore API errors
            }
        }

        return view('participants.success', compact('participant', 'recommended', 'categoryId', 'level', 'courseTitle'));
    }
}
