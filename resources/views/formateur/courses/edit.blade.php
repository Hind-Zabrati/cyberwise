<x-app-layout>
    <div class="p-6">
        <h2 class="text-xl font-bold mb-4">Modifier le cours</h2>
        <form method="POST" action="{{ route('formateur.courses.update', $course) }}">
            @csrf @method('PUT')
            @include('formateur.courses.form', ['course' => $course])
        </form>
    </div>
</x-app-layout>
