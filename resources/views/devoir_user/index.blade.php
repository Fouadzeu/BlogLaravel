<x-default-layout title="Mes Devoirs">
    <div class="container mx-auto p-6">
        @if(session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4" role="alert">
                <strong class="font-bold">Succès!</strong>
                <span class="block sm:inline">{{ session('success') }}</span>
            </div>
        @endif

        @if(session('error'))
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4" role="alert">
                <strong class="font-bold">Erreur!</strong>
                <span class="block sm:inline">{{ session('error') }}</span>
            </div>
        @endif

        <h1 class="text-5xl text-center font-bold mb-4 text-red-600">Devoirs Disponibles</h1>

        @if($devoirs->count())
            <div x-data="{ selected: null }" class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach($devoirs as $devoir)
                    <div
                        @click="selected = {{ $devoir->id }}"
                        class="cursor-pointer bg-white shadow-lg rounded-lg overflow-hidden transform transition duration-300 hover:-translate-y-2 hover:shadow-2xl"
                        :class="{ 'border-2 border-red-500': selected === {{ $devoir->id }} }">
                        <form action="{{ route('user.devoir.inscrire') }}" method="POST" class="h-full flex flex-col">
                            @csrf
                            <input type="hidden" name="userId" value="{{ auth()->user()->id }}">
                            <input type="hidden" name="devoirId" value="{{ $devoir->id }}">

                            <!-- Icône animée remplaçant l'image -->
                            <div class="flex justify-center items-center h-32 bg-gray-100">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-16 w-16 text-blue-600 animate-bounce" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                                </svg>
                            </div>

                            <div class="p-4 flex-1 flex flex-col justify-between">
                                <div>
                                    <h3 class="font-semibold text-red-600">{{ $devoir->titre }}</h3>
                                    <p class="text-gray-600 text-sm mt-2">{{ $devoir->description }}</p>
                                </div>

                                <div>
                                    @if($devoir->date_fin < now())
                                        <button type="button" disabled
                                        class="block mt-4 px-2 bg-gray-500 text-white text-center py-2 rounded cursor-not-allowed">
                                            Terminé
                                        </button>
                                    @else
                                        @if(in_array($devoir->id, $inscriptions))
                                            <a href="{{ route('user.devoirs.show', $devoir->id) }}"
                                            class="block mt-4 px-2 bg-blue-600 text-white text-center py-2 rounded hover:bg-blue-500">
                                                En cours
                                            </a>
                                        @else
                                            <button type="submit"
                                            class="block mt-4 px-2 bg-green-600 text-white text-center py-2 rounded hover:bg-green-700">
                                                Commencer
                                            </button>
                                        @endif
                                    @endif
                                </div>
                            </div>
                        </form>
                    </div>
                @endforeach
            </div>
        @else
            <p class="text-gray-500">Aucun devoir trouvé.</p>
        @endif

    </div>

    <!-- Inclusion de Alpine.js -->
</x-default-layout>
