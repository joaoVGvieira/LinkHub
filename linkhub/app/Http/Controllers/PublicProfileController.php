<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;

class PublicProfileController extends Controller
{
    public function show($username)
    {
        // Encontra o usuário pelo 'username' ou falha (erro 404)
        $user = User::where('username', $username)->firstOrFail();

        // Pega os links do usuário (a relação 'links' já ordena)
        $links = $user->links;

        // Retorna a view pública com os dados
        return view('profile.show', compact('user', 'links'));
    }
}
