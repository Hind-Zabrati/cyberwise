<x-app-layout>
    <div class="p-6">
        <h2 class="text-2xl font-bold mb-4">Modules du cours : {{ $course->title }}</h2>

        <a href="{{ route('formateur.courses.modules.create', $course) }}" class="btn btn-primary mb-4">Ajouter un module</a>

        @foreach($modules as $module)
            <div class="bg-white shadow p-4 mb-3 rounded">
                <h3 class="text-lg font-semibold">{{ $module->title }}</h3>

                <div class="mt-2">
                    <a href="{{ route('formateur.courses.modules.edit', [$course, $module]) }}" class="text-blue-500">Modifier</a>

                    <form action="{{ route('formateur.courses.modules.destroy', [$course, $module]) }}" method="POST" class="inline-block ml-2" onsubmit="return confirm('Supprimer ce module ?')">
                        @csrf @method('DELETE')
                        <button class="text-red-500">Supprimer</button>
                    </form>
                </div>
            </div>
        @endforeach
    </div>
</x-app-layout>
