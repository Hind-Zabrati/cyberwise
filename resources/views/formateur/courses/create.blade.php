<x-app-layout>
    <div class="p-6">
        <h2 class="text-xl font-bold mb-4">Créer un nouveau cours</h2>
        <form method="POST" action="{{ route('formateur.courses.store') }}">
            @csrf
            @include('formateur.courses.form')
        </form>
    </div>
</x-app-layout>