<x-defaultprof-layout title="{{ $devoir->titre }}">
    <div class="container mx-auto p-6">
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
    </div>
</x-defaultprof-layout>
