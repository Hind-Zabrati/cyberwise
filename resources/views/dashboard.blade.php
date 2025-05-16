<x-app-layout>
    <div class="py-12 max-w-7xl mx-auto sm:px-6 lg:px-8">

        <h1 class="text-3xl font-bold mb-8">Tableau de bord</h1>

        {{-- ADMIN --}}
        @if($user->role === 'admin')
            <section class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
                <div class="bg-white p-6 rounded shadow">
                    <h2 class="text-lg font-semibold">Utilisateurs</h2>
                    <p class="text-4xl font-bold text-indigo-600">{{ $userCount }}</p>
                </div>
                <div class="bg-white p-6 rounded shadow">
                    <h2 class="text-lg font-semibold">Cours actifs</h2>
                    <p class="text-4xl font-bold text-green-600">{{ $activeCourses }}</p>
                </div>
                <div class="bg-white p-6 rounded shadow">
                    <h2 class="text-lg font-semibold">Quiz en attente</h2>
                    <p class="text-4xl font-bold text-yellow-600">{{ $pendingQuizzes }}</p>
                </div>
            </section>

            <section class="bg-white p-6 rounded shadow">
                <h2 class="text-xl font-bold mb-4">Liste des utilisateurs</h2>
                <table class="w-full table-auto border border-gray-200">
                    <thead>
                        <tr class="bg-gray-100">
                            <th class="border px-4 py-2">Nom</th>
                            <th class="border px-4 py-2">Email</th>
                            <th class="border px-4 py-2">Rôle</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($users as $u)
                            <tr>
                                <td class="border px-4 py-2">{{ $u->name }}</td>
                                <td class="border px-4 py-2">{{ $u->email }}</td>
                                <td class="border px-4 py-2">{{ $u->role }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

                <div class="mt-4">
                    {{ $users->links() }}
                </div>
            </section>

        {{-- FORMATEUR --}}
        @elseif($user->role === 'formateur')
            <div class="bg-white p-6 rounded shadow">
                <h2 class="text-xl font-bold mb-4">Bienvenue Formateur !</h2>
                <p>Vos cours, quiz à corriger, statistiques d'apprenants...</p>
            </div>

        {{-- APPRENANT --}}
        @elseif($user->role === 'apprenant')
            <div class="bg-white p-6 rounded shadow">
                <h2 class="text-xl font-bold mb-4">Bienvenue Apprenant !</h2>
                <p>Vos cours en cours, progression, certificats...</p>
            </div>

        {{-- AUTRE --}}
        @else
            <div class="bg-red-100 p-4 rounded shadow">
                <p>Rôle inconnu.</p>
            </div>
        @endif

    </div>
</x-app-layout>
