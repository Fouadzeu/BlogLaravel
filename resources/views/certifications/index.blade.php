@extends('layouts.app')

@section('content')
<div class="container mx-auto p-6">
    <h1 class="text-2xl font-bold mb-4">Mes Certifications</h1>
    @if($certifications->count())
        <ul class="space-y-4">
            @foreach($certifications as $cert)
                <li class="bg-white shadow rounded p-4">
                    <h3 class="font-bold text-gray-800">Certification : {{ $cert->cours->title }}</h3>
                    <p class="text-gray-600">
                        Obtenue le : {{ \Carbon\Carbon::parse($cert->certified_at)->format('d/m/Y') }}
                    </p>
                </li>
            @endforeach
        </ul>
    @else
        <p>Aucune certification obtenue.</p>
    @endif
</div>
@endsection
