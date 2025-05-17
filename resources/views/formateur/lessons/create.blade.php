<x-app-layout>
    <div class="p-6">
        <h2 class="text-xl font-bold mb-4">Ajouter une leçon au module : {{ $module->title }}</h2>

        <form method="POST" action="{{ route('formateur.courses.modules.lessons.store', [$course, $module]) }}" enctype="multipart/form-data">
            @csrf
            @include('formateur.lessons.form')
        </form>
    </div>
</x-app-layout>
