<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\ImportController;
use App\Http\Controllers\SurveyController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// Redirect root depending on authentication
Route::get('/', function () {
    return auth()->check()
        ? redirect()->route('dashboard')  // Logged-in users → dashboard
        : redirect()->route('login');     // Guests → login
});

// Import CSV routes
Route::get('/import', [ImportController::class, 'showForm']);
Route::post('/import', [ImportController::class, 'import'])->name('import');

// Events
Route::get('/events', [EventController::class, 'index'])->name('events.index');

// Authentication routes
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Registration steps
Route::get('/register-step1', [RegisterController::class, 'showStep1'])->name('register.step1');
Route::post('/register-step1', [RegisterController::class, 'storeStep1'])->name('register.step1.store');

Route::get('/register-step2', [RegisterController::class, 'showStep2'])->name('register.step2');
Route::post('/register-step2', [RegisterController::class, 'register'])->name('register.store');

// Survey routes
Route::middleware('auth')->group(function () {
    // Survey
    Route::get('/survey', [SurveyController::class, 'create'])->name('survey.create');
    Route::post('/survey', [SurveyController::class, 'store'])->name('survey.store');

    // Dashboard
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // Optional: welcome page after first login/registration
    Route::get('/welcomePage', function () {
        return view('welcomePage');
    })->name('welcomePage');

Route::get('/profile', [ProfileController::class, 'index'])->name('profile');
Route::post('/profile', [ProfileController::class, 'update'])->name('profile.update');

});
