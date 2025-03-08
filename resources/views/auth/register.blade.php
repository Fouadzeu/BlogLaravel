

<x-register-layout title=" Inscription Apprenant" :action="route('register')" submitMessage="Inscription">
    <h1 class="text-center text-blue-600">Inscription Apprenant</h1>
<x-input name="name" label="nom complet" />
<x-input name="email" label="Adresse Email" type="email" />
<x-input name="password" label="Mot de passe" type="password"/>
<x-input name="password_confirmation" label="Confirmation du mot de passe" type="password" />
<label for="specialite_id">Specialite:</label>
<br>
<Select class="form-input block w-full rounded-md border-0 py-1.5 ring-1 ring-inset focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" name="specialite_id">
    @foreach ($specialites as $specialite)
    <option value="{{ $specialite->id }}">{{ $specialite->nom }}</option>
    @endforeach
</Select>
</x-register-layout>
