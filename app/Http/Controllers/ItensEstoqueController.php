<?php

namespace App\Http\Controllers;

use App\Models\ItensEstoque;
use Illuminate\Http\Request;

class ItensEstoqueController extends Controller
{
    public function index($categoria)
    {
        $itensEstoque = ItensEstoque::where('Categoria', $categoria)->get();        return response()->json($itensEstoque);
    }

    public function store(Request $request)
    {
        $request->validate([
            'Nome' => 'required',
            'Categoria' => 'required',
            'Preco' => 'required',
            'Descricao' => 'required',
            'Quantidade' => 'required',
        ]);

        $item = new ItensEstoque;
        $item->Nome = $request->input('Nome');
        $item->Categoria = $request->input('Categoria');
        $item->Preco = $request->input('Preco');
        $item->Descricao = $request->input('Descricao');
        $item->Quantidade = $request->input('Quantidade');
        $item->save();

        return response()->json(['message' => 'Item criado com sucesso'], 201);
    }
}
