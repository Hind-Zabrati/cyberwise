<x-app-layout>
    <div class="p-6">
        <h2 class="text-2xl font-bold mb-4">Mes cours</h2>

        <a href="{{ route('formateur.courses.create') }}" class="btn btn-primary mb-4">Créer un cours</a>

        @foreach($courses as $course)
            <div class="bg-white shadow p-4 mb-3 rounded">
                <h3 class="text-xl font-semibold">{{ $course->title }}</h3>
                <p>{{ $course->description }}</p>
                <div class="mt-2">
                    <a href="{{ route('formateur.courses.edit', $course) }}" class="text-blue-500">Modifier</a>
                    <form action="{{ route('formateur.courses.destroy', $course) }}" method="POST" class="inline-block ml-2" onsubmit="return confirm('Supprimer ce cours ?')">
                        @csrf @method('DELETE')
                        <button class="text-red-500">Supprimer</button>
                    </form>
                </div>
            </div>
        @endforeach

        {{ $courses->links() }}
    </div>
</x-app-layout>
