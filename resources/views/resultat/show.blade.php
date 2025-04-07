<x-defaultprof-layout title="Détails du résultat">
    @if(session('statut'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
            <strong class="font-bold">Succès !</strong>
            <span class="block sm:inline">{{ session('statuts') }}</span>
            <span class="absolute top-0 bottom-0 right-0 px-4 py-3">
                <svg class="fill-current h-6 w-6 text-green-500" role="button" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                    <title>Fermer</title>
                    <path d="M14.59 5.41L10 10l4.59 4.59L13 16.17l-4.59-4.59L3 14.59 1.41 13 6 8.41 1.41 3.83 3 2.42l4.59 4.59L13 1.41z"/>
                </svg>
            </span>
        </div>
        @endif

        @if(session('error'))
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
            <strong class="font-bold">Erreur !</strong>
            <span class="block sm:inline">{{ session('error') }}</span>
            <span class="absolute top-0 bottom-0 right-0 px-4 py-3">
                <svg class="fill-current h-6 w-6 text-red-500" role="button" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                    <title>Fermer</title>
                    <path d="M14.59 5.41L10 10l4.59 4.59L13 16.17l-4.59-4.59L3 14.59 1.41 13 6 8.41 1.41 3.83 3 2.42l4.59 4.59L13 1.41z"/>
                </svg>
            </span>
        </div>
        @endif
    <div class="bg-white p-6 shadow rounded-lg mt-6">
        <h2 class="text-2xl font-semibold mb-4">Résultats Soumis</h2>
        @if($resultats->count())
            @foreach($resultats as $resultat)
                <div class="bg-white shadow-lg rounded-lg overflow-hidden w-full mb-6">
                    <div class="p-4 flex flex-col justify-between">
                        <div>
                            <h3 class="font-semibold text-red-600">Apprenant(e) : {{ $resultat->user->name }}</h3>
                            <p class="text-gray-800 text-bold mt-2"><span class="text-blue-600">Spécialité : </span>{{ $resultat->specialite->nom }}</p>
                            <p class="text-gray-800 text-sm mt-2"><span class="text-blue-600">Contenu :</span></p>
                            <p class="text-gray-700 text-xl mt-2">{{ $resultat->content }}</p>
                        </div>

                        @if($resultat->document)
                            <div class="mt-4">
                                <a href="{{ asset('documents/' . $resultat->document) }}" target="_blank" class="block px-2 bg-blue-600 text-white text-center py-2 rounded hover:bg-blue-500">
                                    Voir Document
                                </a>
                            </div>
                        @endif

                        <!-- Affichage conditionnel de la note -->
                        <div class="mt-4">
                            <p class="text-gray-800"><strong>Note :</strong>
                                @if(is_null($resultat->note))
                                    <span class="text-gray-500">Non encore attribuée</span>
                                @else
                                    {{ $resultat->note }}
                                @endif
                            </p>
                            <p class="text-gray-800"><strong>Commentaire :</strong>
                                {{ $resultat->commentaire ?? 'Aucun commentaire disponible' }}
                            </p>
                        </div>

                        <!-- Formulaire pour attribuer une note et un commentaire -->
                        <form action="{{ route('professeur.resultat.update', $resultat->id) }}" method="POST" class="mt-4">
                            @csrf
                            @method('PUT')
                            <div class="mb-3">
                                <label for="note" class="block text-sm font-medium text-gray-700">Note</label>
                                <input type="number" name="note" id="note" value="{{ $resultat->note }}" class="block w-full p-2 border rounded">
                            </div>
                            <div class="mb-3">
                                <label for="commentaire" class="block text-sm font-medium text-gray-700">Commentaire</label>
                                <textarea name="commentaire" id="commentaire" rows="3" class="block w-full p-2 border rounded">{{ $resultat->commentaire }}</textarea>
                            </div>
                            <button type="submit" class="block px-4 py-2 bg-green-600 text-white rounded hover:bg-green-500">
                                Enregistrer
                            </button>
                        </form>
                    </div>
                </div>
            @endforeach
        @else
            <p class="text-gray-500">Aucun résultat soumis pour ce devoir.</p>
        @endif
    </div>
</x-defaultprof-layout>
