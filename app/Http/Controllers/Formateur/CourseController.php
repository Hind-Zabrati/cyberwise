<?php

namespace App\Http\Controllers\Formateur;

use App\Http\Controllers\Controller;
use App\Models\Course;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    public function index()
    {
        $courses = auth()->user()->courses()->latest()->paginate(10);
        return view('formateur.courses.index', compact('courses'));
    }

    public function create()
    {
        return view('formateur.courses.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        auth()->user()->courses()->create($request->only('title', 'description'));

        return redirect()->route('formateur.courses.index')->with('success', 'Cours créé.');
    }

    public function edit(Course $course)
    {
        $this->authorizeAccess($course);
        return view('formateur.courses.edit', compact('course'));
    }

    public function update(Request $request, Course $course)
    {
        $this->authorizeAccess($course);

        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        $course->update($request->only('title', 'description'));

        return redirect()->route('formateur.courses.index')->with('success', 'Cours mis à jour.');
    }

    public function destroy(Course $course)
    {
        $this->authorizeAccess($course);
        $course->delete();

        return redirect()->route('formateur.courses.index')->with('success', 'Cours supprimé.');
    }

    private function authorizeAccess(Course $course)
    {
        if ($course->formateur_id !== auth()->id()) {
            abort(403);
        }
    }
}
