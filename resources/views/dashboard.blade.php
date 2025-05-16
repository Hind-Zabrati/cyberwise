{{-- resources/views/dashboard.blade.php --}}

<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <h1>Tableau de bord</h1>

            @if(auth()->user()->role === 'admin')
                <h2>Bienvenue Admin !</h2>
                <p>Gestion des utilisateurs, statistiques globales...</p>

            @elseif(auth()->user()->role === 'formateur')
                <h2>Bienvenue Formateur !</h2>
                <p>Vos cours, nombre d’apprenants, quiz à corriger...</p>

            @elseif(auth()->user()->role === 'apprenant')
                <h2>Bienvenue Apprenant !</h2>
                <p>Vos cours en cours, progression, certificats...</p>

            @else
                <p>Rôle inconnu.</p>
            @endif

        </div>
    </div>
</x-app-layout>
