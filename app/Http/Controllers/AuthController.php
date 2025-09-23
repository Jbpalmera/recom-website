<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Survey;

class AuthController extends Controller
{
    // Show login form
    public function showLoginForm()
    {
        return view('auth.login');
    }

    // Handle login


public function login(Request $request)
{
    $credentials = $request->validate([
        'email' => ['required', 'email'],
        'password' => ['required'],
    ]);

    if (Auth::attempt($credentials)) {
        $request->session()->regenerate();

        $user = Auth::user();

        // If first login, save timestamp
        if (is_null($user->last_login_at)) {
            $user->update(['last_login_at' => now()]);

            // Check if the user already has a survey
            $hasSurvey = Survey::where('user_id', $user->id)->exists();

            if (!$hasSurvey) {
                // New user without survey → redirect to survey
                return redirect()->route('survey.create')
                    ->with('success', 'Please complete your survey first! 🎯');
            } else {
                // Existing user → go to welcomePage or dashboard
                return redirect()->route('dashboard')
                    ->with('success', 'Welcome back! 🎉');
            }
        }

        // Returning user → redirect to dashboard
        return redirect()->route('dashboard');
    }

    return back()->withErrors([
        'email' => 'The provided credentials do not match our records.',
        'password' => 'Password Incorrect',
    ]);
}


    // Logout
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login');
    }
}
