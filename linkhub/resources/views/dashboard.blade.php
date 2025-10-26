<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            
            @if (session('success'))
                <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4" role="alert">
                    {{ session('success') }}
                </div>
            @endif

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6 mb-6">
                <h3 class="text-lg font-medium mb-4 text-gray-900">Adicionar Novo Link</h3>
                
                <!-- USE ACTION ABSOLUTA ENQUANTO RESOLVEMOS AS ROTAS -->
                <form action="/links" method="POST">
                    @csrf
                    
                    <div class="mb-4">
                        <label for="title" class="block text-sm font-medium text-gray-700">Título</label>
                        <input type="text" 
                               name="title" 
                               id="title" 
                               class="mt-1 block w-full border border-gray-300 rounded-md p-2 @error('title') border-red-500 @enderror" 
                               value="{{ old('title') }}" 
                               required>
                        
                        @error('title')
                            <span class="text-red-500 text-sm mt-1">{{ $message }}</span>
                        @enderror
                    </div>
                    
                    <div class="mb-4">
                        <label for="url" class="block text-sm font-medium text-gray-700">URL</label>
                        <input type="url" 
                               name="url" 
                               id="url" 
                               class="mt-1 block w-full border border-gray-300 rounded-md p-2 @error('url') border-red-500 @enderror" 
                               placeholder="https://exemplo.com" 
                               value="{{ old('url') }}" 
                               required>
                        
                        @error('url')
                            <span class="text-red-500 text-sm mt-1">{{ $message }}</span>
                        @enderror
                    </div>
                    
                    <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Salvar Link</button>
                </form>
            </div>

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                <h3 class="text-lg font-medium mb-4 text-gray-900">Meus Links ({{ Auth::user()->links->count() }})</h3>
                
                @if (Auth::user()->links->count() > 0)
                    @foreach (Auth::user()->links as $link)
                        <div class="flex justify-between items-center mb-4 p-4 border border-gray-200 rounded-lg">
                            <div class="flex-1">
                                <strong class="text-lg block">{{ $link->title }}</strong>
                                <a href="{{ $link->url }}" target="_blank" class="text-blue-500 text-sm block mt-1 break-all">
                                    {{ $link->url }}
                                </a>
                            </div>
                            <div class="flex space-x-2">
                                <!-- Use ação absoluta para edit também -->
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