<?php

namespace App\Http\Controllers;

use App\Models\Link; // Importe o Model Link
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; // Importe Auth para o método index
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class LinkController extends Controller
{
    use AuthorizesRequests;

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Carrega os links do usuário logado
        $links = Link::where('user_id', Auth::id())
                     ->orderBy('order', 'asc')
                     ->get();
        
        // Retorna a view 'links.index' (certifique-se que ela exista)
        return view('links.index', compact('links'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Geralmente não é usado em um CRUD de dashboard
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // 1. Valida os dados que vêm do formulário
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'url' => 'required|url|max:255',
        ]);

        // 2. Cria o link associado ao usuário logado
        //    (Com a correção para definir 'order' como 0)
        $request->user()->links()->create([
            'title' => $data['title'],
            'url'   => $data['url'],
            'order' => 0 
        ]);

        // 3. Redireciona de volta para o dashboard com mensagem de sucesso
        return redirect()->route('dashboard')->with('success', 'Link criado com sucesso!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // Não usado neste projeto
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Link $link) // Alterado de 'string $id' para 'Link $link'
    {
        // Garante que o usuário só pode editar os *seus* próprios links
        $this->authorize('update', $link);
        
        // Retorna a view de edição com o link específico
        return view('links.edit', compact('link'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Link $link)
    {
        // Garante que o usuário só pode editar os *seus* próprios links
        $this->authorize('update', $link);

        // Valida os dados
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'url' => 'required|url|max:255',
        ]);

        // Atualiza o link
        $link->update($data);

        // Redireciona para o dashboard
        return redirect('/dashboard')->with('success', 'Link atualizado!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Link $link)
    {
        // Garante que o usuário só pode deletar os *seus* próprios links
        $this->authorize('delete', $link);

        $link->delete();

        return redirect()->route('dashboard')->with('success', 'Link deletado!');
    }
}