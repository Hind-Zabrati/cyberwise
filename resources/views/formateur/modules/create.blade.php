<x-app-layout>
    <div class="p-6">
        <h2 class="text-xl font-bold mb-4">Ajouter un module</h2>
        <form method="POST" action="{{ route('formateur.courses.modules.store', $course) }}">
            @csrf
            @include('formateur.modules.form')
        </form>
    </div>
</x-app-layout>