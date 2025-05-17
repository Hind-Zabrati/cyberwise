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
        <h2 class="text-2xl font-bold mb-4">Bienvenue Formateur {{ $user->name }}</h2>

        <div class="flex justify-end mb-4">
            <a href="{{ route('formateur.courses.create') }}"
               class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700">
                ➕ Créer un cours
            </a>
        </div>

        @forelse ($formateurCourses as $course)
            <div class="border p-4 rounded mb-6 bg-gray-50">
                <h3 class="text-lg font-semibold mb-1">{{ $course->title }}</h3>
                <p class="text-sm text-gray-600 mb-2">{{ $course->description }}</p>

                <div class="flex flex-wrap gap-2 mb-3">
                    <a href="{{ route('formateur.courses.edit', $course) }}"
                       class="text-blue-600 hover:underline">✏️ Modifier</a>
                    <form action="{{ route('formateur.courses.destroy', $course) }}"
                          method="POST" onsubmit="return confirm('Supprimer ce cours ?')" class="inline">
                        @csrf @method('DELETE')
                        <button class="text-red-600 hover:underline">🗑 Supprimer</button>
                    </form>
                </div>

                <div class="flex justify-between items-center mb-2">
                    <h4 class="text-md font-semibold">Modules</h4>
                    <a href="{{ route('formateur.courses.modules.create', $course) }}"
                       class="text-indigo-600 hover:underline">➕ Ajouter un module</a>
                </div>

                @if($course->modules->count())
                    <ul class="list-disc list-inside text-sm text-gray-800 space-y-2">
                        @foreach($course->modules as $module)
                            <li>
                                <div class="flex items-center justify-between">
                                    <span><strong>{{ $module->title }}</strong></span>
                                    <div class="flex gap-2">
                                        <a href="{{ route('formateur.courses.modules.edit', [$course, $module]) }}"
                                           class="text-blue-600 hover:underline">✏️</a>
                                        <form action="{{ route('formateur.courses.modules.destroy', [$course, $module]) }}"
                                              method="POST" onsubmit="return confirm('Supprimer ce module ?')" class="inline">
                                            @csrf @method('DELETE')
                                            <button class="text-red-600 hover:underline">🗑</button>
                                        </form>
                                        <a href="{{ route('formateur.courses.modules.lessons.create', [$course, $module]) }}"
                                           class="text-green-600 hover:underline">➕ Leçon</a>
                                    </div>
                                </div>

                                @if($module->lessons->count())
                                    <ul class="list-disc list-inside ml-5 mt-1 text-gray-600">
                                        @foreach($module->lessons as $lesson)
                                            <li class="flex items-center justify-between">
                                                <span>{{ $lesson->title }} ({{ strtoupper($lesson->type) }})</span>
                                                <div class="flex gap-2">
                                                    <a href="{{ route('formateur.courses.modules.lessons.edit', [$course, $module, $lesson]) }}"
                                                       class="text-blue-500 hover:underline">✏️</a>
                                                    <form action="{{ route('formateur.courses.modules.lessons.destroy', [$course, $module, $lesson]) }}"
                                                          method="POST" onsubmit="return confirm('Supprimer cette leçon ?')" class="inline">
                                                        @csrf @method('DELETE')
                                                        <button class="text-red-500 hover:underline">🗑</button>
                                                    </form>
                                                </div>
                                            </li>
                                        @endforeach
                                    </ul>
                                @else
                                    <p class="ml-5 text-sm text-gray-500">Aucune leçon.</p>
                                @endif
                            </li>
                        @endforeach
                    </ul>
                @else
                    <p class="text-sm text-gray-500">Aucun module pour ce cours.</p>
                @endif
            </div>
        @empty
            <p class="text-gray-500">Vous n’avez encore aucun cours. Cliquez sur “Créer un cours” pour commencer.</p>
        @endforelse
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
