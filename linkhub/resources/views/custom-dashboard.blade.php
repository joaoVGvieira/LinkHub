@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
<div class="min-h-screen py-8">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <!-- Welcome Section -->
        <div class="text-center mb-12">
            <h1 class="text-4xl font-bold text-white mb-4">
                Olá, {{ Auth::user()->name }}!!!
            </h1>
            <p class="text-xl text-gray-200">Gerencie seus links de forma elegante</p>
        </div>

        @if (session('success'))
            <div class="glass-effect rounded-xl p-4 mb-8 border border-green-500/30 animate-pulse">
                <div class="flex items-center">
                    <i class="fas fa-check-circle text-green-400 text-xl mr-3"></i>
                    <span class="text-green-200 font-medium">{{ session('success') }}</span>
                </div>
            </div>
        @endif

        <!-- Add Link Card -->
        <div class="glass-effect rounded-2xl p-8 mb-8 card-hover">
            <h3 class="text-2xl font-bold text-white mb-6 flex items-center">
                <i class="fas fa-plus-circle mr-3 text-cyan-400"></i>
                Adicionar Novo Link
            </h3>
            
            <form action="/links" method="POST" class="space-y-6">
                @csrf
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label for="title" class="block text-sm font-medium text-gray-200 mb-2">
                            <i class="fas fa-heading mr-2"></i>Título do Link
                        </label>
                        <input type="text" 
                               name="title" 
                               id="title" 
                               class="w-full px-4 py-3 bg-white/10 border border-gray-300/30 rounded-xl text-white placeholder-gray-300 focus:outline-none focus:ring-2 focus:ring-cyan-400 focus:border-transparent transition duration-300"
                               placeholder="Ex: Meu Portfolio"
                               value="{{ old('title') }}" 
                               required>
                        @error('title')
                            <p class="text-red-300 text-sm mt-2 flex items-center">
                                <i class="fas fa-exclamation-circle mr-1"></i>{{ $message }}
                            </p>
                        @enderror
                    </div>
                    
                    <div>
                        <label for="url" class="block text-sm font-medium text-gray-200 mb-2">
                            <i class="fas fa-link mr-2"></i>URL
                        </label>
                        <input type="url" 
                               name="url" 
                               id="url" 
                               class="w-full px-4 py-3 bg-white/10 border border-gray-300/30 rounded-xl text-white placeholder-gray-300 focus:outline-none focus:ring-2 focus:ring-cyan-400 focus:border-transparent transition duration-300"
                               placeholder="https://exemplo.com"
                               value="{{ old('url') }}" 
                               required>
                        @error('url')
                            <p class="text-red-300 text-sm mt-2 flex items-center">
                                <i class="fas fa-exclamation-circle mr-1"></i>{{ $message }}
                            </p>
                        @enderror
                    </div>
                </div>
                
                <button type="submit" class="w-full py-3 px-6 bg-gradient-to-r from-cyan-500 to-blue-500 text-white rounded-xl font-semibold hover:from-cyan-600 hover:to-blue-600 transform hover:scale-105 transition duration-300 shadow-lg">
                    <i class="fas fa-plus mr-2"></i>Adicionar Link
                </button>
            </form>
        </div>

        <!-- Links Section -->
        <div class="glass-effect rounded-2xl p-8">
            <div class="flex justify-between items-center mb-8">
                <h3 class="text-2xl font-bold text-white flex items-center">
                    <i class="fas fa-list mr-3 text-cyan-400"></i>
                    Meus Links
                    <span class="ml-3 bg-cyan-500 text-white px-3 py-1 rounded-full text-sm">
                        {{ Auth::user()->links->count() }}
                    </span>
                </h3>
            </div>
            
            @if (Auth::user()->links->count() > 0)
                <div class="grid gap-6">
                    @foreach (Auth::user()->links as $link)
                        <div class="bg-white/5 rounded-xl p-6 card-hover border border-white/10">
                            <div class="flex flex-col md:flex-row md:items-center justify-between">
                                <div class="flex-1 mb-4 md:mb-0">
                                    <h4 class="text-xl font-semibold text-white mb-2 flex items-center">
                                        <i class="fas fa-external-link-alt mr-3 text-cyan-400"></i>
                                        {{ $link->title }}
                                    </h4>
                                    <a href="{{ $link->url }}" target="_blank" 
                                       class="text-cyan-300 hover:text-cyan-200 transition duration-300 break-all flex items-center">
                                        <i class="fas fa-globe mr-2"></i>
                                        {{ $link->url }}
                                    </a>
                                </div>
                                <div class="flex space-x-3">
                                    <a href="/links/{{ $link->id }}/edit" 
                                       class="bg-yellow-500 hover:bg-yellow-600 text-white px-4 py-2 rounded-lg transition duration-300 transform hover:scale-105 flex items-center">
                                        <i class="fas fa-edit mr-2"></i>Editar
                                    </a>
                                    
                                    <form action="/links/{{ $link->id }}" method="POST" 
                                          onsubmit="return confirm('Tem certeza que deseja deletar este link?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" 
                                                class="bg-red-500 hover:bg-red-600 text-white px-4 py-2 rounded-lg transition duration-300 transform hover:scale-105 flex items-center">
                                            <i class="fas fa-trash mr-2"></i>Deletar
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @else
                <div class="text-center py-12">
                    <i class="fas fa-inbox text-gray-400 text-6xl mb-4"></i>
                    <h4 class="text-xl text-gray-300 mb-2">Nenhum link cadastrado</h4>
                    <p class="text-gray-400">Adicione seu primeiro link acima!</p>
                </div>
            @endif
        </div>
    </div>
</div>
@endsection