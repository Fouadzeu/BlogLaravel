<x-defaultprof-layout title="Mon compte">
        <h1 class="text-center text-xl">Profil de {{ $prof->nom }}</h1>

        @if(session('statuts'))
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

        @if(session('error'))
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
        <form action="{{ route('professeur.profile.update.email') }}" method="post">
            @csrf
            @method('PATCH')
        <div class="space-y-12">
            <div class="border-b border-gray-900/10 pb-12">
            <h1 class="text-base font-semibold leading-7 text-gray-900">votre Email: <span>{{ $prof->email }}</span></h1>
            <p class="mt-1 text-sm leading-6 text-gray-600">Vous pouvez modifier votre email pour vos futures connexions.</p>
            <div class="mt-10 space-y-8 md:w-2/3">
                <x-input type="email" name="email" label="Nouvelle addresse mail" />
                <x-input type="email" name="email_confirmation" label="Confirmation de l'email" />
            </div>
            <div class="mt-6 flex items-center  gap-x-6">
                <button type="submit" class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Modifier</button>
            </div>
        </form>
            <br>
    <form action="{{ route('professeur.profile.update.password') }}" method="POST">
                @csrf
                @method('PATCH')
            <h1 class="text-base font-semibold leading-7 text-gray-900">Mot de passe</h1>
            <p class="mt-1 text-sm leading-6 text-gray-600">Vous pouvez modifier votre mot de passe pour vos futures connexions.</p>

            <div class="mt-10 space-y-8 md:w-2/3">
                <x-input type="password" name="current_password" label="Mot de passe actuel" />
                <x-input type="password" name="password" label="Nouveau mot de passe" />
                <x-input type="password" name="password_confirmation" label="Confirmation du nouveau mot de passe" />
            </div>
            <div class="mt-6 flex items-center gap-x-6">
                <button type="submit" class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Modifier</button>
            </div>
        </div>
    </form>
</x-defaultprof-layout>
