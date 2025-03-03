<x-default-layout>
@section('content')
<div class="container mx-auto p-6">
    <h1 class="text-2xl font-bold mb-4">Mes Cours</h1>
    @if($cours->count())
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
            @foreach($cours as $cour)
                <div class="bg-white shadow rounded-lg overflow-hidden">
                    <img src="{{ $cour->image ?? 'https://via.placeholder.com/600x200' }}"
                         alt="{{ $cour->title }}"
                         class="w-full h-32 object-cover">
                    <div class="p-4">
                        <h3 class="font-semibold text-gray-800">{{ $cour->title }}</h3>
                        <p class="text-gray-600 text-sm mt-2">{{ $cour->description }}</p>
                        <a href="{{ route('cours.show', $cour->id) }}"
                           class="block mt-4 bg-red-600 text-white text-center py-2 rounded hover:bg-red-700">
                            Continuer le cours
                        </a>
                    </div>
                </div>
            @endforeach
        </div>
    @else
        <p>Aucun cours trouvé.</p>
    @endif
</div>
@endsection
</x-default-layout>
