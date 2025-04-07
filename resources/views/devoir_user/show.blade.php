<x-default-layout title="{{ $devoir->titre }}">
    <div class="container mx-auto p-6">
        @if(session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4" role="alert">
                <strong class="font-bold">Succès !</strong>
                <span class="block sm:inline">{{ session('success') }}</span>
                <span class="absolute top-0 bottom-0 right-0 px-4 py-3">
                    <svg class="fill-current h-6 w-6 text-green-500" role="button" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                        <title>Fermer</title>
                        <path d="M14.59 5.41L10 10l4.59 4.59L13 16.17l-4.59-4.59L3 14.59 1.41 13 6 8.41 1.41 3.83 3 2.42l4.59 4.59L13 1.41z"/>
                    </svg>
                </span>
            </div>
        @endif

        <h1 class="text-3xl font-bold mb-4">{{ $devoir->titre }}</h1>
        <p class="text-gray-600 mb-6 text-2xl">Description: {{ $devoir->description }}</p>

        <div class="bg-white p-6 shadow rounded-lg">
            <h2 class="text-2xl font-semibold mb-4">Contenu du Devoir</h2>
            @if ($devoir->content)
                <p>{{ $devoir->content }}</p>
            @elseif ($devoir->document)
                <h3 class="text-xl font-semibold mb-2">Document</h3>
                <iframe src="{{ asset('documents/' . $devoir->document) }}" width="100%" height="600px"></iframe>
                <p class="mt-4">
                    <a href="{{ asset('documents/' . $devoir->document) }}" target="_blank" class="text-blue-500">Télécharger le document</a>
                </p>
            @else
                <p>Aucun contenu disponible pour ce devoir.</p>
            @endif
        </div>

        <!-- Vérifier si l'utilisateur a déjà soumis un résultat -->
        @if($resultatExistant)
            <!-- Afficher le résultat soumis -->
            <div class="bg-white p-6 shadow rounded-lg mt-6">
                <h2 class="text-2xl font-semibold mb-4">Votre Résultat</h2>
                <div class="mb-4">
                    <h3 class="text-xl font-semibold mb-2">Contenu</h3>
                    <p>{{ $resultatExistant->content }}</p>
                </div>
                @if($resultatExistant->document)
                    <div class="mb-4">
                        <h3 class="text-xl font-semibold mb-2">Document</h3>
                        <iframe src="{{ asset('documents/' . $resultatExistant->document) }}" width="100%" height="600px"></iframe>
                        <p class="mt-4">
                            <a href="{{ asset('documents/' . $resultatExistant->document) }}" target="_blank" class="text-blue-500">Télécharger le document</a>
                        </p>
                    </div>
                @endif
                <!-- Afficher la note et le commentaire seulement s'ils existent -->
                <div class="mt-4">
                    @if(!is_null($resultatExistant->note))
                        <p class="text-gray-800"><strong>Note :</strong> {{ $resultatExistant->note }}</p>
                    @endif
                    @if(!is_null($resultatExistant->commentaire))
                        <p class="text-gray-800"><strong>Commentaire :</strong> {{ $resultatExistant->commentaire }}</p>
                    @endif
                </div>
            </div>
        @else
            <!-- Formulaire pour soumettre un résultat -->
            <div class="bg-white p-6 shadow rounded-lg mt-6">
                <h2 class="text-2xl font-semibold mb-4">Soumettre votre résultat</h2>
                <form action="{{ route('user.resultats.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="devoir_id" value="{{ $devoir->id }}">
                    <input type="hidden" name="specialite_id" value="{{ auth()->user()->specialite_id }}">
                    <div class="mb-4">
                        <label for="content" class="block text-gray-700">Contenu</label>
                        <textarea name="content" id="content" rows="4" class="w-full mt-2 p-2 border rounded" required></textarea>
                    </div>
                    <div class="mb-4">
                        <label for="document" class="block text-gray-700">Document</label>
                        <input type="file" name="document" id="document" class="w-full mt-2 p-2 border rounded" required>
                    </div>
                    <div class="mb-4">
                        <button type="submit" class="bg-blue-500 text-white py-2 px-4 rounded hover:bg-blue-600">Soumettre</button>
                    </div>
                </form>
            </div>
        @endif
    </div>
</x-default-layout>
