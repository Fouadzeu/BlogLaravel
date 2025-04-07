<x-defaultadmin-layout>
    <h1>Gestion des utilisateurs</h1>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nom</th>
                <th>Rôle</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
                <tr>
                    <td>{{ $user->id }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->getRoleNames()->first() }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</x-defaultadmin-layout>
