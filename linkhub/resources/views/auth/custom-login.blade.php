@extends('layouts.app')

@section('title', 'Login')

@section('content')
<div class="min-h-screen flex items-center justify-center py-12 px-4 sm:px-6 lg:px-8">
    <div class="max-w-md w-full space-y-8">
        <div class="glass-effect rounded-2xl p-8 shadow-2xl">
            <!-- Header -->
            <div class="text-center">
                <div class="mx-auto h-20 w-20 bg-white rounded-full flex items-center justify-center mb-6">
                    <i class="fas fa-lock text-indigo-600 text-2xl"></i>
                </div>
                <h2 class="text-3xl font-bold text-white">Bem-vindo de volta</h2>
                <p class="mt-2 text-gray-200">Entre na sua conta</p>
            </div>

            <form class="mt-8 space-y-6" action="/login" method="POST">
                @csrf
                
                @if ($errors->any())
                    <div class="bg-red-500/20 border border-red-500 text-red-200 px-4 py-3 rounded-lg">
                        <div class="flex items-center">
                            <i class="fas fa-exclamation-triangle mr-2"></i>
                            @foreach ($errors->all() as $error)
                                <span class="text-sm">{{ $error }}</span>
                            @endforeach
                        </div>
                    </div>
                @endif

                <div class="space-y-4">
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
                            <input id="password" name="password" type="password" autocomplete="current-password" required 
                                class="relative block w-full pl-10 pr-3 py-3 bg-white/10 border border-gray-300/30 rounded-lg text-white placeholder-gray-300 focus:outline-none focus:ring-2 focus:ring-cyan-400 focus:border-transparent transition duration-300"
                                placeholder="Sua senha">
                        </div>
                    </div>
                </div>

                <div class="flex items-center justify-between">
                    <div class="flex items-center">
                        <input id="remember_me" name="remember" type="checkbox" 
                            class="h-4 w-4 text-indigo-600 focus:ring-indigo-500 border-gray-300 rounded">
                        <label for="remember_me" class="ml-2 block text-sm text-gray-200">
                            Lembrar de mim
                        </label>
                    </div>

                    <div class="text-sm">
                        <a href="#" class="font-medium text-cyan-300 hover:text-cyan-200 transition duration-300">
                            Esqueceu sua senha?
                        </a>
                    </div>
                </div>

                <div>
                    <button type="submit" class="group relative w-full flex justify-center py-3 px-4 border border-transparent text-sm font-medium rounded-lg text-white btn-primary focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 transition duration-300">
                        <i class="fas fa-sign-in-alt mr-2"></i>
                        Entrar na conta
                    </button>
                </div>

                <div class="text-center">
                    <span class="text-gray-200">Não tem uma conta?</span>
                    <a href="/register" class="font-medium text-cyan-300 hover:text-cyan-200 ml-1 transition duration-300">
                        Registre-se aqui
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection