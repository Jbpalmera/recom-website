<?php

use App\Http\Controllers\Admin\Auth\LoginController;
use App\Http\Controllers\Admin\TrainingController;
use App\Http\Controllers\Admin\CreateEventController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\ImportController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SurveyController;
use App\Http\Controllers\RecommenderController;
use App\Http\Controllers\Admin\UploadDataSetController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// Root redirect depending on auth
Route::get('/', function () {
    return auth()->check()
        ? redirect()->route('dashboard') // Logged-in users → dashboard
        : redirect()->route('login');    // Guests → login
});

// Import CSV
Route::get('/import', [ImportController::class, 'showForm']);
Route::post('/import', [ImportController::class, 'import'])->name('import');

// Public Events (if any)
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

// Routes for authenticated users
Route::middleware('auth')->group(function () {
    // Survey
    Route::get('/survey', [SurveyController::class, 'create'])->name('survey.create');
    Route::post('/survey', [SurveyController::class, 'store'])->name('survey.store');

    // User dashboard
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // Profile
    Route::get('/profile', [ProfileController::class, 'index'])->name('profile');
    Route::post('/profile', [ProfileController::class, 'update'])->name('profile.update');
});

// ------------------- ADMIN ROUTES ------------------- //

// Admin login
Route::get('/admin/login', [LoginController::class, 'showLoginForm'])->name('admin.login');
Route::post('/admin/login', [LoginController::class, 'login'])->name('admin.login.submit');
Route::post('/admin/logout', [LoginController::class, 'logout'])->name('admin.logout');

// Protected admin routes
Route::prefix('admin')->middleware('auth.admin')->group(function () {
    Route::get('/dashboard', function () {
        return view('admin.dashboard');
    })->name('admin.dashboard');

    Route::get('/create-events', [CreateEventController::class, 'create'])->name('admin.createEvents');
    Route::post('/create-events', [CreateEventController::class, 'store'])->name('admin.storeEvents');

    Route::get('/events', [TrainingController::class, 'index'])->name('admin.viewEvents');
    Route::get('/events/{id}/edit', [TrainingController::class, 'edit'])->name('admin.editEvents');
    Route::put('/events/{id}', [TrainingController::class, 'update'])->name('admin.updateEvents');
    Route::delete('/events/{id}', [TrainingController::class, 'destroy'])->name('admin.deleteEvents');
});

Route::get('/recommendations/{id}', [DashboardController::class, 'getRecommendations']);

Route::get('/recommend', [RecommenderController::class, 'getRecommendations'])->name('recommendations');

// Route::get('/upload-dataset', [UploadDataSetController::class, 'showUploadForm'])
//     ->name('admin.upload_dataset');

// Route::post('/upload-dataset', [UploadDataSetController::class, 'uploadDataset'])
//     ->name('admin.upload_dataset.post');

// Route::get('/retrain-status', [UploadDataSetController::class, 'status'])
//     ->name('admin.retrain_status');
