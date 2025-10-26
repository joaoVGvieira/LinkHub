@extends('layouts.app')

@section('title', 'Registrar')

@section('content')
<div class="min-h-screen flex items-center justify-center py-12 px-4 sm:px-6 lg:px-8">
    <div class="max-w-md w-full space-y-8">
        <div class="glass-effect rounded-2xl p-8 shadow-2xl">
            <!-- Header -->
            <div class="text-center">
                <div class="mx-auto h-20 w-20 bg-white rounded-full flex items-center justify-center mb-6">
                    <i class="fas fa-user-plus text-indigo-600 text-2xl"></i>
                </div>
                <h2 class="text-3xl font-bold text-white">Crie sua conta</h2>
                <p class="mt-2 text-gray-200">Junte-se ao LinkHub hoje</p>
            </div>

            <form class="mt-8 space-y-6" action="/register" method="POST">
                @csrf
                
                @if ($errors->any())
                    <div class="bg-red-500/20 border border-red-500 text-red-200 px-4 py-3 rounded-lg">
                        <div class="flex items-center mb-2">
                            <i class="fas fa-exclamation-triangle mr-2"></i>
                            <strong class="font-semibold">Por favor, corrija os seguintes erros:</strong>
                        </div>
                        <ul class="list-disc list-inside space-y-1 text-sm">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <div class="space-y-4">
                    <div>
                        <label for="name" class="sr-only">Nome completo</label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <i class="fas fa-user text-gray-400"></i>
                            </div>
                            <input id="name" name="name" type="text" autocomplete="name" required 
                                class="relative block w-full pl-10 pr-3 py-3 bg-white/10 border border-gray-300/30 rounded-lg text-white placeholder-gray-300 focus:outline-none focus:ring-2 focus:ring-cyan-400 focus:border-transparent transition duration-300"
                                placeholder="Seu nome completo" value="{{ old('name') }}">
                        </div>
                    </div>

                    <div>
                        <label for="email" class="sr-only">Email</label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <i class="fas fa-envelope text-gray-400"></i>
                            </div>
                            <input id="email" name="email" type="email" autocomplete="email" required 
                                class="relative block w-full pl-10 pr-3 py-3 bg-white/10 border border-gray-300/30 rounded-lg text-white placeholder-gray-300 focus:outline-none focus:ring-2 focus:ring-cyan-400 focus:border-transparent transition duration-300"
                                placeholder="seu@email.com" value="{{ old('email') }}">
                        </div>
                    </div>

                    <div>
                        <label for="password" class="sr-only">Senha</label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <i class="fas fa-lock text-gray-400"></i>
                            </div>
                            <input id="password" name="password" type="password" autocomplete="new-password" required 
                                class="relative block w-full pl-10 pr-3 py-3 bg-white/10 border border-gray-300/30 rounded-lg text-white placeholder-gray-300 focus:outline-none focus:ring-2 focus:ring-cyan-400 focus:border-transparent transition duration-300"
                                placeholder="Crie uma senha forte">
                        </div>
                    </div>

                    <div>
                        <label for="password_confirmation" class="sr-only">Confirmar senha</label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <i class="fas fa-lock text-gray-400"></i>
                            </div>
                            <input id="password_confirmation" name="password_confirmation" type="password" autocomplete="new-password" required 
                                class="relative block w-full pl-10 pr-3 py-3 bg-white/10 border border-gray-300/30 rounded-lg text-white placeholder-gray-300 focus:outline-none focus:ring-2 focus:ring-cyan-400 focus:border-transparent transition duration-300"
                                placeholder="Confirme sua senha">
                        </div>
                    </div>
                </div>

                <div class="flex items-center">
                    <input id="terms" name="terms" type="checkbox" required
                        class="h-4 w-4 text-indigo-600 focus:ring-indigo-500 border-gray-300 rounded">
                    <label for="terms" class="ml-2 block text-sm text-gray-200">
                        Concordo com os <a href="#" class="text-cyan-300 hover:text-cyan-200">Termos de Serviço</a> e <a href="#" class="text-cyan-300 hover:text-cyan-200">Política de Privacidade</a>
                    </label>
                </div>

                <div>
                    <button type="submit" class="group relative w-full flex justify-center py-3 px-4 border border-transparent text-sm font-medium rounded-lg text-white btn-primary focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 transition duration-300">
                        <i class="fas fa-user-plus mr-2"></i>
                        Criar conta
                    </button>
                </div>

                <div class="text-center">
                    <span class="text-gray-200">Já tem uma conta?</span>
                    <a href="/login" class="font-medium text-cyan-300 hover:text-cyan-200 ml-1 transition duration-300">
                        Entre aqui
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection