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
    <div class="bg-white p-6 rounded shadow mb-6">
        <h2 class="text-2xl font-bold mb-4">Bienvenue Formateur {{ $user->name }} !</h2>
        <p class="mb-4 text-gray-700">Voici un aperçu de votre activité :</p>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div class="bg-gray-50 p-4 rounded shadow">
                <h3 class="text-lg font-semibold mb-2">Vos cours</h3>
                @if($formateurCourses && count($formateurCourses))
                    <ul class="list-disc list-inside text-sm">
                        @foreach($formateurCourses as $course)
                            <li>{{ $course->title }}</li>
                        @endforeach
                    </ul>
                @else
                    <p class="text-gray-500">Aucun cours pour le moment.</p>
                @endif
            </div>

            <div class="bg-gray-50 p-4 rounded shadow">
                <h3 class="text-lg font-semibold mb-2">Quiz à corriger</h3>
                @if($quizzesToCorrect && count($quizzesToCorrect))
                    <ul class="list-disc list-inside text-sm">
                        @foreach($quizzesToCorrect as $quiz)
                            <li>{{ $quiz->title }} ({{ $quiz->submitted_count }} soumissions)</li>
                        @endforeach
                    </ul>
                @else
                    <p class="text-gray-500">Aucun quiz à corriger.</p>
                @endif
            </div>
        </div>
    </div>


        {{-- APPRENANT --}}
@elseif($user->role === 'apprenant')
    <div class="bg-white p-6 rounded shadow">
        <h2 class="text-2xl font-bold mb-4">Bienvenue Apprenant {{ $user->name }} !</h2>
        <p class="mb-6 text-gray-700">Voici un aperçu de votre apprentissage :</p>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <!-- Cours suivis -->
            <div class="bg-gray-50 p-4 rounded shadow">
                <h3 class="text-lg font-semibold mb-2">Vos cours</h3>
                @if($apprenantCourses && count($apprenantCourses))
                    <ul class="list-disc list-inside text-sm">
                        @foreach($apprenantCourses as $course)
                            <li>{{ $course->title }}</li>
                        @endforeach
                    </ul>
                @else
                    <p class="text-gray-500">Aucun cours suivi pour le moment.</p>
                @endif
            </div>

            <!-- Progression -->
            <div class="bg-gray-50 p-4 rounded shadow">
                <h3 class="text-lg font-semibold mb-2">Progression</h3>
                <div class="w-full bg-gray-200 rounded-full h-4">
                    <div class="bg-blue-600 h-4 rounded-full" style="width: {{ $progress ?? 0 }}%"></div>
                </div>
                <p class="text-sm mt-2 text-gray-600">{{ $progress ?? 0 }}% terminé</p>
            </div>

            <!-- Certificats -->
            <div class="bg-gray-50 p-4 rounded shadow md:col-span-2">
                <h3 class="text-lg font-semibold mb-2">Vos certificats</h3>
                @if($certificates && count($certificates))
                    <ul class="list-disc list-inside text-sm">
                        @foreach($certificates as $cert)
                            <li>{{ $cert->title }} ({{ $cert->date_obtenu }})</li>
                        @endforeach
                    </ul>
                @else
                    <p class="text-gray-500">Aucun certificat encore obtenu.</p>
                @endif
            </div>
        </div>
    </div>


        {{-- AUTRE --}}
        @else
            <div class="bg-red-100 p-4 rounded shadow">
                <p>Rôle inconnu.</p>
            </div>
        @endif

    </div>
</x-app-layout>
