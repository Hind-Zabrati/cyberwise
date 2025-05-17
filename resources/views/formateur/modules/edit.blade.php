<x-app-layout>
    <div class="p-6">
        <h2 class="text-xl font-bold mb-4">Modifier le module</h2>
        <form method="POST" action="{{ route('formateur.courses.modules.update', [$course, $module]) }}">
            @csrf @method('PUT')
            @include('formateur.modules.form', ['module' => $module])
        </form>
    </div>
</x-app-layout>