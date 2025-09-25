<?php

use App\Http\Controllers\Admin\AdminProfileController;
use App\Http\Controllers\Admin\CreateEventController;
use App\Http\Controllers\Admin\TrainingController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\EventRegistrationController;
use App\Http\Controllers\ImportController;
use App\Http\Controllers\ParticipantController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SurveyController;
use App\Http\Controllers\Admin\Auth\AdminAuthController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

/*
|--------------------------------------------------------------------------
| Public / Guest Routes
|--------------------------------------------------------------------------
*/

// Root redirect based on authentication
Route::get('/', function () {
    return auth()->check()
        ? redirect()->route('dashboard') // Logged-in users → dashboard
        : redirect()->route('login');    // Guests → login
});

// Welcome page
Route::get('/welcome', fn () => view('welcomePage'))->name('welcomePage');
// about page
Route::get('/about', [App\Http\Controllers\PageController::class, 'about'])->name('about');

// Import CSV form (public access, optional)
Route::get('/import', [ImportController::class, 'showForm']);
Route::post('/import', [ImportController::class, 'import'])->name('import');

// Public events listing
Route::get('/events', [EventController::class, 'index'])->name('events.index');

// Individual event details
Route::get('/events/{id}', [EventController::class, 'show'])->name('events.showInfo');
Route::get('/events/title/{title}', [EventController::class, 'showByTitle'])->name('events.showByTitle');
Route::get('/events/external/{external_id}', [EventController::class, 'showByExternalId'])
    ->name('events.showExternal');

// Join form page for an event
Route::get('/events/{eventId}/join', [EventRegistrationController::class, 'create'])
    ->name('events.joinForm')->middleware('auth');

// join from recommended
Route::get('/events/{eventId}/join', [EventRegistrationController::class, 'create'])->name('events.joinForm');

// Handle form submission
Route::post('/events/{event}/join', [EventRegistrationController::class, 'store'])->name('events.joinProcess');

// Authentication routes (public)
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Registration steps
Route::get('/register-step1', [RegisterController::class, 'showStep1'])->name('register.step1');
Route::post('/register-step1', [RegisterController::class, 'storeStep1'])->name('register.step1.store');
Route::get('/register-step2', [RegisterController::class, 'showStep2'])->name('register.step2');
Route::post('/register-step2', [RegisterController::class, 'register'])->name('register.store');

/*
|--------------------------------------------------------------------------
| Authenticated User Routes
|--------------------------------------------------------------------------
*/
Route::middleware('auth')->group(function () {

    // User dashboard
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // Survey
    Route::get('/survey', [SurveyController::class, 'create'])->name('survey.create');
    Route::post('/survey', [SurveyController::class, 'store'])->name('survey.store');

    // Profile
    Route::get('/profile', [ProfileController::class, 'index'])->name('profile');
    Route::post('/profile', [ProfileController::class, 'update'])->name('profile.update');

});

/*
|--------------------------------------------------------------------------
| Admin Authentication Routes
|--------------------------------------------------------------------------
*/
Route::prefix('admin')->group(function () {
    // Login form
    Route::get('/login', [AdminAuthController::class, 'showAdminLoginForm'])->name('admin.login');
    // Login POST
    Route::post('/login', [AdminAuthController::class, 'login'])->name('admin.login.submit');
    // Logout (can also be protected)
    Route::post('/logout', [AdminAuthController::class, 'logout'])->name('admin.logout');
});


/*
|--------------------------------------------------------------------------
| Protected Admin Routes (requires 'auth.admin')
|--------------------------------------------------------------------------
*/
Route::prefix('admin')->middleware('auth.admin')->group(function () {
    // Admin dashboard
    Route::get('/dashboard', fn () => view('admin.dashboard'))->name('admin.dashboard');

    Route::get('/create-events', [CreateEventController::class, 'create'])->name('admin.events.createEvents');
    Route::post('/create-events', [CreateEventController::class, 'store'])->name('admin.storeEvents');

    Route::get('/events', [TrainingController::class, 'index'])->name('admin.viewEvents');
    Route::get('/events/{id}/edit', [TrainingController::class, 'edit'])->name('admin.editEvents');
    Route::put('/events/{id}', [TrainingController::class, 'update'])->name('admin.updateEvents');
    Route::delete('/events/{id}', [TrainingController::class, 'destroy'])->name('admin.deleteEvents');

    Route::get('/profile', [AdminProfileController::class, 'index'])->name('admin.profile');
    Route::post('/profile', [AdminProfileController::class, 'update'])->name('admin.profile.update');
});

/*
|--------------------------------------------------------------------------
| Recommendation Routes
|--------------------------------------------------------------------------
*/

// Get recommendations for a specific event (user dashboard)
Route::get('/recommendations/{id}', [DashboardController::class, 'getRecommendations']);

// General recommendation route
Route::get('/recommend', [ParticipantController::class, 'getRecommendations'])->name('recommendations');

/*
|--------------------------------------------------------------------------
| Join Particpants Routes
|--------------------------------------------------------------------------
*/
// Handle participant registration
Route::post('/participants', [ParticipantController::class, 'store'])
    ->name('participants.store')->middleware('auth');

// Success page
Route::get('/participants/{id}/success', [ParticipantController::class, 'success'])
    ->name('participants.success')->middleware('auth');
