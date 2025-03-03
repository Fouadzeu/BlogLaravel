<x-default-layout>
    <div class="container mx-auto p-6">
        <h1 class="text-2xl font-bold mb-4">Cours Disponibles</h1>
        @if($cours->count())
            <!-- Composant Alpine pour stocker l'ID de la carte sélectionnée -->
            <div x-data="{ selected: null }" class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                @foreach($cours as $cour)
                    <div
                        @click="selected = {{ $cour->id }}"
                        class="cursor-pointer shadow rounded-lg overflow-hidden transform transition duration-300 hover:-translate-y-2"
                        :class="{ 'border-2 border-red-500': selected === {{ $cour->id }} }">
                        <img src="{{ $cour->image ?? 'https://via.placeholder.com/600x200' }}"
                             alt="{{ $cour->title }}"
                             class="w-full h-32 object-cover">
                        <div class="p-4">
                            <h3 class="font-semibold text-gray-800">{{ $cour->title }}</h3>
                            <p class="text-gray-600 text-sm mt-2">{{ $cour->description }}</p>
                            <a href="{{ route('cours.index', $cour->id) }}"
                               class="block mt-4 bg-red-600 text-white text-center py-2 rounded hover:bg-red-700">
                                Commencer
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
        @else
            <p>Aucun cours trouvé.</p>
        @endif
    </div>

    <!-- Inclusion de Alpine.js -->
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
</x-default-layout>
