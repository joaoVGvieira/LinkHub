<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $user->name }} - LinkHub</title>
    <script src="https://cdn.tailwindcss.com"></script> 
</head>
<body class="bg-gray-100">
    <div class="container mx-auto max-w-lg text-center p-4">

        <div class="w-24 h-24 rounded-full bg-gray-300 mx-auto my-4"></div> 

        <h1 class="text-2xl font-bold">{{ $user->name }}</h1>
        <p class="text-gray-600 mb-8">@ {{ $user->username }}</p>

        <div class="flex flex-col space-y-4">
            @forelse ($links as $link)
                <a href="{{ $link->url }}" 
                   target="_blank" 
                   rel="noopener" 
                   class="block w-full bg-blue-500 text-white p-4 rounded-lg text-lg font-semibold hover:bg-blue-600">
                    {{ $link->title }}
                </a>
            @empty
                <p class="text-gray-500">Este usuário ainda não adicionou links.</p>
            @endforelse
        </div>

    </div>
</body>
</html>