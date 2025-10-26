@extends('layouts.app')

@section('title', 'Editar Link')

@section('content')
<div class="min-h-screen py-8">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <!-- Header -->
        <div class="text-center mb-12">
            <h1 class="text-4xl font-bold text-white mb-4 flex items-center justify-center">
                <i class="fas fa-edit text-cyan-400 mr-4"></i>
                Editar Link
            </h1>
            <p class="text-xl text-gray-200">Atualize as informações do seu link</p>
        </div>

        <!-- Edit Form -->
        <div class="glass-effect rounded-2xl p-8 card-hover">
            <form action="/links/{{ $link->id }}" method="POST" class="space-y-6">
                @csrf
                @method('PUT')
                
                @if (session('success'))
                    <div class="bg-green-500/20 border border-green-500 text-green-200 px-4 py-3 rounded-lg flex items-center">
                        <i class="fas fa-check-circle mr-3"></i>
                        {{ session('success') }}
                    </div>
                @endif

                <div class="grid grid-cols-1 gap-6">
                    <div>
                        <label for="title" class="block text-sm font-medium text-gray-200 mb-2 flex items-center">
                            <i class="fas fa-heading mr-2 text-cyan-400"></i>Título do Link
                        </label>
                        <input type="text" 
                               name="title" 
                               id="title" 
                               class="w-full px-4 py-3 bg-white/10 border border-gray-300/30 rounded-xl text-white placeholder-gray-300 focus:outline-none focus:ring-2 focus:ring-cyan-400 focus:border-transparent transition duration-300"
                               value="{{ old('title', $link->title) }}" 
                               required>
                        @error('title')
                            <p class="text-red-300 text-sm mt-2 flex items-center">
                                <i class="fas fa-exclamation-circle mr-1"></i>{{ $message }}
                            </p>
                        @enderror
                    </div>
                    
                    <div>
                        <label for="url" class="block text-sm font-medium text-gray-200 mb-2 flex items-center">
                            <i class="fas fa-link mr-2 text-cyan-400"></i>URL
                        </label>
                        <input type="url" 
                               name="url" 
                               id="url" 
                               class="w-full px-4 py-3 bg-white/10 border border-gray-300/30 rounded-xl text-white placeholder-gray-300 focus:outline-none focus:ring-2 focus:ring-cyan-400 focus:border-transparent transition duration-300"
                               value="{{ old('url', $link->url) }}" 
                               required>
                        @error('url')
                            <p class="text-red-300 text-sm mt-2 flex items-center">
                                <i class="fas fa-exclamation-circle mr-1"></i>{{ $message }}
                            </p>
                        @enderror
                    </div>
                </div>
                
                <div class="flex flex-col sm:flex-row gap-4 pt-6">
                    <button type="submit" class="flex-1 bg-gradient-to-r from-green-500 to-cyan-500 text-white py-3 px-6 rounded-xl font-semibold hover:from-green-600 hover:to-cyan-600 transform hover:scale-105 transition duration-300 shadow-lg flex items-center justify-center">
                        <i class="fas fa-save mr-2"></i>Atualizar Link
                    </button>
                    
                    <a href="/dashboard" class="flex-1 bg-gradient-to-r from-gray-600 to-gray-700 text-white py-3 px-6 rounded-xl font-semibold hover:from-gray-700 hover:to-gray-800 transform hover:scale-105 transition duration-300 shadow-lg flex items-center justify-center">
                        <i class="fas fa-arrow-left mr-2"></i>Voltar
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection