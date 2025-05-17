<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Formateur\CourseController;
use App\Http\Controllers\Formateur\ModuleController;
use App\Http\Controllers\Formateur\LessonController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// Accueil (page publique)
Route::get('/', function () {
    return view('homepage');
});

// Routes accessibles uniquement aux utilisateurs authentifiés
Route::middleware(['auth', 'verified'])->group(function () {
    // Profil utilisateur
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Dashboard commun à tous les rôles
    Route::get('/dashboard', [DashboardController::class, 'index'])
        ->name('dashboard');
});

// Routes pour le formateur uniquement
Route::middleware(['auth', 'role:formateur'])->prefix('formateur')->name('formateur.')->group(function () {
    // CRUD Cours
    Route::resource('courses', CourseController::class);

    // CRUD Modules imbriqués dans un cours
    Route::prefix('courses/{course}')->name('courses.')->group(function () {
        Route::resource('modules', ModuleController::class);

        // CRUD Leçons imbriquées dans un module
        Route::prefix('modules/{module}')->name('modules.')->group(function () {
            Route::resource('lessons', LessonController::class);
        });
    });
});

// Auth routes (login, register, mot de passe oublié, etc.)
require __DIR__.'/auth.php';
