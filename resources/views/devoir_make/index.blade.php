<x-defaultprof-layout title="Assigner un Devoir">

    @if(session('success'))
    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
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

    @if($errors->any())
    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
        <strong class="font-bold">Erreur !</strong>
        <span class="block sm:inline">{{ $errors->first() }}</span>
        <span class="absolute top-0 bottom-0 right-0 px-4 py-3">
            <svg class="fill-current h-6 w-6 text-red-500" role="button" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                <title>Fermer</title>
                <path d="M14.59 5.41L10 10l4.59 4.59L13 16.17l-4.59-4.59L3 14.59 1.41 13 6 8.41 1.41 3.83 3 2.42l4.59 4.59L13 1.41z"/>
            </svg>
        </span>
    </div>
    @endif

    <div class="container mx-auto mt-8" x-data="formHandler()">
        <div class="bg-white p-6 rounded-lg shadow-lg">
            <h2 class="text-2xl font-bold mb-4">Créer un Nouveau Devoir</h2>
            <form action="{{ route('professeur.devoirs.store') }}" method="POST" @submit.prevent="validateForm" enctype="multipart/form-data">
                @csrf
                <div class="mb-4">
                    <label for="titre" class="block text-gray-700">Titre</label>
                    <input type="text" name="titre" id="titre" class="w-full mt-2 p-2 border rounded" required>
                </div>
                <div class="mb-4">
                    <label for="cour" class="block text-gray-700">Cour</label>
                    <input type="text" name="cour" class="w-full mt-2 p-2 border rounded" required>
                </div>
                <div class="mb-4">
                    <label for="specialite_id" class="block text-gray-700">Choisir la spécialité où sera attribué le devoir</label>
                    <select class="w-full mt-2 p-2 border rounded" name="specialite_id">
                        @foreach ($specialites as $specialite)
                        <option value="{{ $specialite->id }}">{{ $specialite->nom }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-4">
                    <input type="hidden" name="professeur_id" required value="{{ $prof->id }}">
                </div>
                <div class="mb-4">
                    <label for="description" class="block text-gray-700">Description</label>
                    <textarea name="description" id="description" rows="4" class="w-full mt-2 p-2 border rounded" required></textarea>
                </div>
                <div class="mb-4">
                    <label for="content" class="block text-gray-700">Contenu</label>
                    <textarea name="content" id="content" x-model="content" @input="checkContent" rows="4" class="w-full mt-2 p-2 border rounded"></textarea>
                </div>
                <div class="mb-4" x-show="documentRequired">
                    <label for="document" class="block text-gray-700">Document (obligatoire si le contenu est vide)</label>
                    <input type="file" name="document" id="document" class="w-full mt-2 p-2 border rounded">
                </div>
                <div class="mb-4">
                    <label for="date_debut" class="block text-gray-700">Date de Début</label>
                    <input type="date" name="date_debut" id="date_debut" class="w-full mt-2 p-2 border rounded" required>
                </div>
                <div class="mb-4">
                    <label for="date_fin" class="block text-gray-700">Date de Fin</label>
                    <input type="date" name="date_fin" id="date_fin" class="w-full mt-2 p-2 border rounded" required>
                </div>
                <div class="mb-4">
                    <button type="submit" class="bg-blue-500 text-white py-2 px-4 rounded hover:bg-blue-600">Créer Devoir</button>
                </div>
            </form>
        </div>
    </div>
    <script>
        function formHandler() {
            return {
                content: '',
                documentRequired: true,
                checkContent() {
                    this.documentRequired = this.content === '';
                },
                validateForm(event) {
                    if (this.documentRequired && !document.querySelector('#document').files.length) {
                        alert('Veuillez fournir un document lorsque le contenu est vide.');
                        event.preventDefault();
                    } else {
                        event.target.submit();
                    }
                }
            }
        }
    </script>
</x-defaultprof-layout>
