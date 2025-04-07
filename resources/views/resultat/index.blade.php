<x-defaultprof-layout title="Résultats des Devoirs">
    <div class="container mx-auto p-6">
        <h1 class="text-3xl font-bold mb-4">Résultats des Devoirs</h1>

        @if($resultats->count())
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach($resultats as $resultat)
                    <div class="bg-white shadow-lg rounded-lg overflow-hidden">
                        <!-- Icône animée remplaçant l'image -->
                        <div class="flex justify-center items-center h-32 bg-gray-100">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-16 w-16 text-blue-600 animate-pulse" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                        </div>
                        <div class="p-4 flex flex-col justify-between">
                            <div>
                                <h3 class="font-semibold text-red-600">Devoir : {{ $resultat->devoir->titre }}</h3>
                                <p class="text-gray-600 text-sm mt-2">Spécialité : {{ $resultat->specialite->nom }}</p>
                                <p class="text-gray-600 text-sm mt-2">Utilisateur : {{ $resultat->user->name }}</p>
                            </div>

                            <div class="mt-4">
                                <a href="{{ route('professeur.resultats.show', $resultat->user_id) }}" class="block px-2 bg-blue-600 text-white text-center py-2 rounded hover:bg-blue-500">
                                    Voir Résultat
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @else
            <p class="text-gray-500">Aucun résultat trouvé.</p>
        @endif
    </div>
</x-defaultprof-layout>
