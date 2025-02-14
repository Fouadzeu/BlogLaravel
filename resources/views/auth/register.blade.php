<x-auth-layout title=" Inscription" :action="route('register')" submitMessage="Inscription">
<x-input name="name" label="nom complet" />
<x-input name="email" label="Adresse Email" type="email" />
<x-input name="password" label="Mot de passe" type="password"/>
<x-input name="password_confirmation" label="Confirmation du mot de passe" type="password" />
</x-auth-layout>