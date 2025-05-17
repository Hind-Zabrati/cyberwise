<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
{
    $user = auth()->user();

    // Variables selon le rôle
    $userCount = null;
    $activeCourses = null;
    $pendingQuizzes = null;
    $users = null;

    $formateurCourses = null;
    $quizzesToCorrect = null;

    $apprenantCourses = null;
    $certificates = null;
    $progress = null;

    if ($user->role === 'admin') {
        $userCount = User::count();
        $activeCourses = 0;
        $pendingQuizzes = 0;
        $users = User::paginate(10);
    }

    if ($user->role === 'formateur') {
        $formateurCourses = []; // Remplace par Course::where('formateur_id', $user->id)->get();
        $quizzesToCorrect = []; // Remplace par Quiz::where('formateur_id', $user->id)->where('status', 'pending')->get();
    }

    if ($user->role === 'apprenant') {
        $apprenantCourses = []; // Ex: $user->courses;
        $certificates = []; // Ex: $user->certificates;
        $progress = 0; // Ex: calcul de progression globale
    }

    return view('dashboard', compact(
        'user',
        'userCount',
        'activeCourses',
        'pendingQuizzes',
        'users',
        'formateurCourses',
        'quizzesToCorrect',
        'apprenantCourses',
        'certificates',
        'progress'
    ));
}

}
