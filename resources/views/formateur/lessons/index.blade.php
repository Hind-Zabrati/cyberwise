<x-app-layout>
    <div class="p-6">
        <h2 class="text-2xl font-bold mb-4">
            Leçons du module : {{ $module->title }}
        </h2>

        <a href="{{ route('formateur.courses.modules.lessons.create', [$course, $module]) }}" class="btn btn-primary mb-4">
            Ajouter une leçon
        </a>

        @foreach ($lessons as $lesson)
            <div class="bg-white shadow p-4 mb-3 rounded">
                <h3 class="text-lg font-semibold">{{ $lesson->title }} ({{ strtoupper($lesson->type) }})</h3>

                @if($lesson->type === 'text')
                    <p class="text-sm mt-2">{{ Str::limit($lesson->content, 100) }}</p>
                @else
                    <a href="{{ asset('storage/' . $lesson->content) }}" target="_blank" class="text-blue-600 underline text-sm">Voir le fichier</a>
                @endif

                <div class="mt-2">
                    <a href="{{ route('formateur.courses.modules.lessons.edit', [$course, $module, $lesson]) }}" class="text-blue-500">Modifier</a>

                    <form action="{{ route('formateur.courses.modules.lessons.destroy', [$course, $module, $lesson]) }}" method="POST" class="inline-block ml-2" onsubmit="return confirm('Supprimer cette leçon ?')">
                        @csrf @method('DELETE')
                        <button type="submit" class="text-red-500">Supprimer</button>
                    </form>
                </div>
            </div>
        @endforeach
    </div>
</x-app-layout>
