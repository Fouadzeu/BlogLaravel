<x-default-layout title="Dashboard">
    <!-- Section Statistiques -->
    <section class="mb-8">
        <h2 class="text-2xl font-semibold text-gray-800 mb-6">Statistiques</h2>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
            <div class="bg-gradient-to-r from-purple-400 via-pink-500 to-red-500 shadow-lg rounded-lg p-6">
                <div class="flex items-center">
                    <div class="p-3 rounded-full bg-white text-red-600">
                        <svg class="w-8 h-8" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M10 2a8 8 0 100 16 8 8 0 000-16zm-1 11.93A6.978 6.978 0 014 9H3a7 7 0 006 6.93V15a1 1 0 102 0v-1.07A6.978 6.978 0 0113 9h-1a7 7 0 00-3 4.93V13a1 1 0 00-2 0v.93z" />
                        </svg>
                    </div>
                    <div class="ml-4">
                        <h3 class="text-white text-lg">Nombre Total De Devoirs</h3>
                        <p class="mt-2 text-3xl font-bold text-white">{{ $nbDevoirsGeneres }}</p>
                    </div>
                </div>
            </div>
            <div class="bg-gradient-to-r from-green-400 to-blue-500 shadow-lg rounded-lg p-6">
                <div class="flex items-center">
                    <div class="p-3 rounded-full bg-white text-blue-600">
                        <svg class="w-8 h-8" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M10 2a8 8 0 100 16 8 8 0 000-16zm1 11.93A6.978 6.978 0 0116 9h1a7 7 0 00-6-6.93V5a1 1 0 11-2 0V2.07A6.978 6.978 0 014 9h1a7 7 0 006 6.93V15a1 1 0 112 0v-1.07z" />
                        </svg>
                    </div>
                    <div class="ml-4">
                        <h3 class="text-white text-lg">Devoirs en Cours</h3>
                        <p class="mt-2 text-3xl font-bold text-white">{{ $devoirsEnCours }}</p>
                    </div>
                </div>
            </div>
            <div class="bg-gradient-to-r from-yellow-400 to-orange-500 shadow-lg rounded-lg p-6">
                <div class="flex items-center">
                    <div class="p-3 rounded-full bg-white text-orange-600">
                        <svg class="w-8 h-8" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M10 2a8 8 0 100 16 8 8 0 000-16zm-1 11.93A6.978 6.978 0 014 9H3a7 7 0 006 6.93V15a1 1 0 102 0v-1.07A6.978 6.978 0 0113 9h-1a7 7 0 00-3 4.93V13a1 1 0 00-2 0v.93z" />
                        </svg>
                    </div>
                    <div class="ml-4">
                        <h3 class="text-white text-lg">Devoirs Terminés</h3>
                        <p class="mt-2 text-3xl font-bold text-white">{{ $devoirsTermines }}</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Section Activité Récente -->
    <section class="mb-8">
        <h2 class="text-2xl font-semibold text-gray-800 mb-6">Activité Récente</h2>
        <div class="bg-white shadow-lg rounded-lg p-6">
            <ul class="divide-y divide-gray-200">
                @foreach ($activitesRecentes as $devoir)
                    <li class="py-4">
                        <div class="flex items-center">
                            <div class="flex-shrink-0">
                                <!-- Icône de document -->
                                <svg class="w-10 h-10 text-gray-500" fill="currentColor" viewBox="0 0 20 20">
                                    <path d="M4 4a2 2 0 00-2 2v8a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2H4zm0 2h12v8H4V6zm2 2v4h8V8H6zm2 2h4v2H8v-2z" />
                                </svg>
                            </div>
                            <div class="ml-4">
                                <div class="text-lg leading-6 font-medium text-gray-900">Devoir : "{{ $devoir->titre }}"</div>
                                <div class="text-sm text-gray-500">Professeur : {{ $devoir->professeur->nom }} ({{ $devoir->professeur->email }})</div>
                                <div class="text-sm text-gray-400">Créé le {{ \Carbon\Carbon::parse($devoir->created_at)->format('d/m/Y') }}</div>
                            </div>
                        </div>
                    </li>
                @endforeach
            </ul>
        </div>
    </section>

    <!-- Section Prochains Délais -->
    <section class="mb-8">
        <h2 class="text-2xl font-semibold text-gray-800 mb-6">Prochains Délais</h2>
        <div class="bg-white shadow-lg rounded-lg p-6">
            <ul class="divide-y divide-gray-200">
                @foreach ($devoirs as $devoir)
                    @if (now()->lessThan($devoir->date_fin))
                        <li class="py-4">
                            <div class="flex items-center">
                                <div class="flex-shrink-0">
                                    <!-- Icône de document -->
                                    <svg class="w-10 h-10 text-gray-500" fill="currentColor" viewBox="0 0 20 20">
                                        <path d="M4 4a2 2 0 00-2 2v8a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2H4zm0 2h12v8H4V6zm2 2v4h8V8H6zm2 2h4v2H8v-2z" />
                                    </svg>
                                </div>
                                <div class="ml-4">
                                    <div class="text-lg leading-6 font-medium text-gray-900">Devoir : "{{ $devoir->titre }}"</div>
                                    <div class="text-sm text-gray-500">Professeur : {{ $devoir->professeur->nom }} - <span class="font-medium">{{ \Carbon\Carbon::parse($devoir->date_fin)->format('d/m/Y') }}</span></div>
                                </div>
                            </div>
                        </li>
                    @endif
                @endforeach
            </ul>
        </div>
    </section>

    <!-- Section Devoirs en cours -->
    <section class="mb-8">
        <h2 class="text-2xl font-semibold text-gray-800 mb-6">Devoirs en cours</h2>
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-4">
            @foreach ($devoirs as $devoir)
                @if (now()->lessThan($devoir->date_fin))
                    <div class="bg-white shadow-lg rounded-lg overflow-hidden">
                        <!-- Icône animée remplaçant l'image -->
                        <div class="flex justify-center items-center h-48 bg-gray-100">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-24 w-24 text-blue-600 animate-pulse" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                        </div>
                        <!-- Contenu de la carte -->
                        <div class="p-4">
                            <h3 class="text-xl font-bold text-gray-800">{{ $devoir->titre }}</h3>
                            <p class="mt-2 text-gray-600">{{ $devoir->description }}</p>
                            <p class="mt-2 text-sm text-gray-500">
                                Date limite : {{ \Carbon\Carbon::parse($devoir->date_fin)->format('d/m/Y') }}
                            </p>
                            <!-- Bouton bleu -->
                            <a href="{{ route('user.devoirs.show', $devoir->id) }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mt-4 inline-block">
                                Voir Devoir
                            </a>
                        </div>
                    </div>
                @endif
            @endforeach
        </div>
    </section>
</x-default-layout>
