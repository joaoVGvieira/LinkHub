<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Meus Links') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                <h3 class="text-lg font-medium mb-4 text-gray-900">Todos os Meus Links</h3>
                
                @if ($links->count() > 0)
                    @foreach ($links as $link)
                        <div class="flex justify-between items-center mb-4 p-4 border border-gray-200 rounded-lg">
                            <div class="flex-1">
                                <strong class="text-lg block">{{ $link->title }}</strong>
                                <a href="{{ $link->url }}" target="_blank" class="text-blue-500 text-sm block mt-1 break-all">
                                    {{ $link->url }}
                                </a>
                            </div>
                            <div class="flex space-x-2">
                                <a href="/links/{{ $link->id }}/edit" class="text-blue-500 hover:text-blue-700">
                                    Editar
                                </a>
                                
                                <form action="/links/{{ $link->id }}" method="POST" class="inline" onsubmit="return confirm('Tem certeza que deseja deletar este link?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-500 hover:text-red-700 ml-2">
                                        Deletar
                                    </button>
                                </form>
                            </div>
                        </div>
                    @endforeach
                @else
                    <p class="text-gray-500 text-center py-4">Nenhum link cadastrado ainda.</p>
                @endif
            </div>
        </div>
    </div>
</x-app-layout>