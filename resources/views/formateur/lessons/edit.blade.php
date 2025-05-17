<x-app-layout>
    <div class="p-6">
        <h2 class="text-xl font-bold mb-4">Modifier la leçon : {{ $lesson->title }}</h2>

        <form method="POST" action="{{ route('formateur.courses.modules.lessons.update', [$course, $module, $lesson]) }}" enctype="multipart/form-data">
            @csrf @method('PUT')
            @include('formateur.lessons.form', ['lesson' => $lesson])
        </form>
    </div>
</x-app-layout>
