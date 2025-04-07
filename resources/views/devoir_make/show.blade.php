<x-defaultprof-layout title="Mes Devoirs">
    <div class="container mx-auto p-6">
        <h1 class="text-3xl font-bold mb-4">Mes Devoirs</h1>

        @if($devoirs->count())
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach($devoirs as $devoir)
                    <div class="bg-white shadow-lg rounded-lg overflow-hidden">
                        <!-- Icône animée remplaçant l'image -->
                        <div class="flex justify-center items-center h-32 bg-gray-100">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-16 w-16 text-blue-600 animate-spin" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536M9 11l6-6m-2 2l-6 6m-3 7h4m4 0h4" />
                            </svg>
                        </div>
                        <div class="p-4 flex flex-col justify-between">
                            <div>
                                <h3 class="font-semibold text-red-600">{{ $devoir->titre }}</h3>
                                <p class="text-gray-600 text-sm mt-2">{{ $devoir->description }}</p>
                                <p class="text-gray-400 text-xs mt-1">Date de fin : {{ $devoir->date_fin }}</p>
                            </div>

                            <div class="mt-4 flex justify-between">
                                <a href="{{ route('professeur.devoirs.show', $devoir->id) }}" class="block px-2 bg-blue-600 text-white text-center py-2 rounded hover:bg-blue-500">
                                    Voir le Devoir
                                </a>
                                <a href="{{ route('professeur.resultats.index', $devoir->id) }}" class="block px-2 bg-green-600 text-white text-center py-2 rounded hover:bg-green-500">
                                    Voir les Résultats
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @else
            <p class="text-gray-500">Aucun devoir trouvé.</p>
        @endif
    </div>
</x-defaultprof-layout>
