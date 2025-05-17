<?php

namespace App\Http\Controllers\Formateur;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\Module;
use Illuminate\Http\Request;

class ModuleController extends Controller
{
    public function index(Course $course)
    {
        $this->authorizeCourse($course);
        $modules = $course->modules()->latest()->get();
        return view('formateur.modules.index', compact('course', 'modules'));
    }

    public function create(Course $course)
    {
        $this->authorizeCourse($course);
        return view('formateur.modules.create', compact('course'));
    }

    public function store(Request $request, Course $course)
    {
        $this->authorizeCourse($course);

        $request->validate([
            'title' => 'required|string|max:255',
        ]);

        $course->modules()->create([
            'title' => $request->title,
        ]);

        return redirect()->route('formateur.courses.modules.index', $course)->with('success', 'Module ajouté.');
    }

    public function edit(Course $course, Module $module)
    {
        $this->authorizeCourse($course);
        return view('formateur.modules.edit', compact('course', 'module'));
    }

    public function update(Request $request, Course $course, Module $module)
    {
        $this->authorizeCourse($course);

        $request->validate([
            'title' => 'required|string|max:255',
        ]);

        $module->update([
            'title' => $request->title,
        ]);

        return redirect()->route('formateur.courses.modules.index', $course)->with('success', 'Module mis à jour.');
    }

    public function destroy(Course $course, Module $module)
    {
        $this->authorizeCourse($course);

        $module->delete();

        return redirect()->route('formateur.courses.modules.index', $course)->with('success', 'Module supprimé.');
    }

    private function authorizeCourse(Course $course)
    {
        if ($course->formateur_id !== auth()->id()) {
            abort(403);
        }
    }
}
