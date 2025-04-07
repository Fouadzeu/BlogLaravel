<x-register-layout title="Inscription Professeur" :action="route('prof.register')" submitMessage="Inscription">
    <h1 class="text-center text-blue-600">Inscription Professeur</h1>
    @csrf
    <x-input name="nom" label="Nom complet" />
    <x-input name="email" label="Adresse Email" type="email" />
    <x-input name="password" label="Mot de passe" type="password"/>
    <x-input name="password_confirmation" label="Confirmation du mot de passe" type="password" />
    <input type="text" class="form-input block w-full rounded-md border-0 py-1.5 ring-1 ring-inset focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" name="code_prof" placeholder="Code Professeur">
    @error('code_prof')
    <p class="mt-2 text-sm text-red-600">
        {{ $message }}
    </p>
    @enderror
</x-register-layout>


