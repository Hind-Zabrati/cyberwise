<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $user = auth()->user();

        // Variables par défaut
        $userCount = null;
        $activeCourses = null;
        $pendingQuizzes = null;
        $users = null;

        // Si admin → charger les données nécessaires
        if ($user->role === 'admin') {
            $userCount = User::count();
            $activeCourses = 0; // Remplace par Course::where(...) si tu as un modèle
            $pendingQuizzes = 0; // Idem pour les quiz
            $users = User::paginate(10);
        }

        return view('dashboard', compact('user', 'userCount', 'activeCourses', 'pendingQuizzes', 'users'));
    }
}
