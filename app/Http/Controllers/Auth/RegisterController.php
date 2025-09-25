<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth; 

class RegisterController extends Controller
{
    // Step 1: Show personal info form
    public function showStep1()
    {
        return view('auth.register-step1');
    }

    // Step 1: Save personal info to session
    public function storeStep1(Request $request)
    {
        // Validate form input
        $request->validate([
            'first_name' => 'required|string',
            'middle_initial' => 'nullable|string|max:1',
            'last_name' => 'required|string',
            'name_extension' => 'nullable|string',
            'gender' => 'required|string',
            'age_group' => 'required|string',
            'civil_status' => 'required|string',
            'nationality' => 'required|string',
            'education' => 'required|string',
            'sector_group' => 'required|string',
            'senior_citizen' => 'nullable|boolean',
            'differently_abled' => 'nullable|boolean',
            'solo_parent' => 'nullable|boolean',
            'region' => 'required|string',
            'province' => 'required|string',
            'city' => 'required|string',
            'agency' => 'required|string',
            'office_affiliation' => 'required|string',
            'designation' => 'required|string',
        ]);

        // Map form fields to session keys
        $request->session()->put('register.step1', [
            'first_name' => $request->first_name,
            'middle_initial' => $request->middle_initial,
            'last_name' => $request->last_name,
            'name_extension' => $request->name_extension,
            'gender' => $request->gender,
            'age_group' => $request->age_group,
            'civil_status' => $request->civil_status,
            'nationality' => $request->nationality,
            'highest_educational_background' => $request->education,
            'sector_group' => $request->sector_group,
            'senior_citizen' => $request->has('senior_citizen') ? 1 : 0,
            'differently_abled' => $request->has('differently_abled') ? 1 : 0,
            'solo_parent' => $request->has('solo_parent') ? 1 : 0,
            'region' => $request->region,
            'province' => $request->province,
            'city_municipality' => $request->city,
            'agency' => $request->agency,
            'office_affiliation' => $request->office_affiliation,
            'designation' => $request->designation,
        ]);

        // Redirect to Step 2
        return redirect()->route('register.step2');
    }

    // Step 2: Show account info form
    public function showStep2()
    {
        if (!session()->has('register.step1')) {
            return redirect()->route('register.step1')->with('error', 'Please complete Step 1 first.');
        }

        return view('auth.register-step2');
    }

    // Step 2: Register user


public function register(Request $request)
{
    // Validate account info
    $request->validate([
        'username' => 'required|string|max:255|unique:users,username',
        'email' => 'required|email|max:255|unique:users,email',
        'password' => 'required|string|min:6|confirmed',
    ]);

    $step1 = session()->get('register.step1');

    // Create user
    $user = User::create([
        'first_name' => $step1['first_name'] ?? null,
        'middle_initial' => $step1['middle_initial'] ?? null,
        'last_name' => $step1['last_name'] ?? null,
        'name_extension' => $step1['name_extension'] ?? null,
        'gender' => $step1['gender'] ?? null,
        'age_group' => $step1['age_group'] ?? null,
        'civil_status' => $step1['civil_status'] ?? null,
        'nationality' => $step1['nationality'] ?? null,
        'highest_educational_background' => $step1['highest_educational_background'] ?? null,
        'sector_group' => $step1['sector_group'] ?? null,
        'senior_citizen' => $step1['senior_citizen'] ?? 0,
        'differently_abled' => $step1['differently_abled'] ?? 0,
        'solo_parent' => $step1['solo_parent'] ?? 0,
        'region' => $step1['region'] ?? null,
        'province' => $step1['province'] ?? null,
        'city_municipality' => $step1['city_municipality'] ?? null,
        'agency' => $step1['agency'] ?? null,
        'office_affiliation' => $step1['office_affiliation'] ?? null,
        'designation' => $step1['designation'] ?? null,
        'username' => $request->username,
        'email' => $request->email,
        'password' => Hash::make($request->password),
    ]);

    // Clear session data
    $request->session()->forget('register');

    // Log in the user explicitly on the web guard
    Auth::guard('web')->login($user);

    return redirect()->route('welcomePage')->with('success', 'Registration successful!');
}

}
