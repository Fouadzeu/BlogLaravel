<x-defaultadmin-layout>
    <h1>Tableau de bord Admin</h1>
    <p>Utilisateurs : {{ $users->count() }}</p>
    <p>Devoirs : {{ $devoirs->count() }}</p>
    <p>Resultats : {{ $resultats->count() }}</p>
</x-defaultadmin-layout>
