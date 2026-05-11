<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Livewire\StudentDashboard;
use App\Http\Controllers\EnrollmentController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Route::get('/student/dashboard', StudentDashboard::class)
//     ->middleware(['auth', 'role:student']);

Route::middleware(['auth'])->group(function () {
    Route::get('/student',[EnrollmentController::class, 'index']);
    Route::get('/student/enroll', [EnrollmentController::class, 'create']);
    Route::post('/student/enroll', [EnrollmentController::class, 'store']);
       Route::get('/student/dashboard', [EnrollmentController::class, 'dashboard']);
});


require __DIR__.'/auth.php';
