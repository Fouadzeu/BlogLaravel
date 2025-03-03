@extends('layouts.app')

@section('content')
<div class="container mx-auto p-6">
    <h1 class="text-2xl font-bold mb-4">Mes Tâches</h1>
    @if($tasks->count())
        <ul class="space-y-4">
            @foreach($tasks as $task)
                <li class="bg-white shadow rounded p-4">
                    <h3 class="font-bold text-gray-800">{{ $task->title ?? 'Tâche' }}</h3>
                    <p class="text-gray-600">{{ $task->description }}</p>
                    <p class="text-gray-500 text-sm">
                        Date limite : {{ \Carbon\Carbon::parse($task->date_limite)->format('d/m/Y') }}
                    </p>
                    <p class="mt-2">
                        Statut :
                        <span class="{{ $task->status == 'completed' ? 'text-green-600' : 'text-red-600'}}">
                            {{ ucfirst($task->status) }}
                        </span>
                    </p>
                </li>
            @endforeach
        </ul>
    @else
        <p>Aucune tâche assignée.</p>
    @endif
</div>
@endsection
