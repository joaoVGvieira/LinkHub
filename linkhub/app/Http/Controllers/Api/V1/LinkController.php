<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Link;

class LinkController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        return $request->user()->links;
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'url' => 'required|url|max:255',
        ]);

        $link = $request->user()->links()->create($validated);

        return response()->json($link, 201); // 201 Created
    }
    /**
     * Display the specified resource.
     */
    public function show(Request $request, Link $link)
    {
        // Valida se o link pertence ao usuário
        if ($request->user()->id !== $link->user_id) {
            return response()->json(['error' => 'Não autorizado'], 403);
        }
        return $link;
    }
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
