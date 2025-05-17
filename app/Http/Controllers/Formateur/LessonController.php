<?php

namespace App\Http\Controllers\Formateur;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\Module;
use App\Models\Lesson;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class LessonController extends Controller
{
    public function index(Course $course, Module $module)
    {
        $this->authorizeModule($course);
        $lessons = $module->lessons()->latest()->get();
        return view('formateur.lessons.index', compact('course', 'module', 'lessons'));
    }

    public function create(Course $course, Module $module)
    {
        $this->authorizeModule($course);
        return view('formateur.lessons.create', compact('course', 'module'));
    }

    public function store(Request $request, Course $course, Module $module)
    {
        $this->authorizeModule($course);

        $request->validate([
            'title' => 'required|string|max:255',
            'type' => 'required|in:text,video,pdf',
            'content' => 'nullable|string',
            'file' => 'nullable|file|mimes:pdf,mp4|max:204800',
        ]);

        $path = null;
        if ($request->hasFile('file')) {
            $path = $request->file('file')->store('lessons', 'public');
        }

        $module->lessons()->create([
            'title' => $request->title,
            'type' => $request->type,
            'content' => $request->type === 'text' ? $request->content : $path,
        ]);

        return redirect()->route('formateur.courses.modules.lessons.index', [$course, $module])->with('success', 'Leçon ajoutée.');
    }

    public function edit(Course $course, Module $module, Lesson $lesson)
    {
        $this->authorizeModule($course);
        return view('formateur.lessons.edit', compact('course', 'module', 'lesson'));
    }

    public function update(Request $request, Course $course, Module $module, Lesson $lesson)
    {
        $this->authorizeModule($course);

        $request->validate([
            'title' => 'required|string|max:255',
            'type' => 'required|in:text,video,pdf',
            'content' => 'nullable|string',
            'file' => 'nullable|file|mimes:pdf,mp4|max:204800',
        ]);

        if ($request->hasFile('file')) {
            if ($lesson->type !== 'text') {
                Storage::disk('public')->delete($lesson->content);
            }
            $lesson->content = $request->file('file')->store('lessons', 'public');
        } elseif ($request->type === 'text') {
            $lesson->content = $request->content;
        }

        $lesson->update([
            'title' => $request->title,
            'type' => $request->type,
            'content' => $lesson->content,
        ]);

        return redirect()->route('formateur.courses.modules.lessons.index', [$course, $module])->with('success', 'Leçon mise à jour.');
    }

    public function destroy(Course $course, Module $module, Lesson $lesson)
    {
        $this->authorizeModule($course);

        if ($lesson->type !== 'text') {
            Storage::disk('public')->delete($lesson->content);
        }

        $lesson->delete();

        return redirect()->route('formateur.courses.modules.lessons.index', [$course, $module])->with('success', 'Leçon supprimée.');
    }

    private function authorizeModule(Course $course)
    {
        if ($course->formateur_id !== auth()->id()) {
            abort(403);
        }
    }
}
