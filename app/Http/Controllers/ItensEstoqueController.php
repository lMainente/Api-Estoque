<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Response;
use App\Models\ItensEstoque;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ItensEstoqueController extends Controller
{
    public function index($categoria = null, $id = null)
    {
        if ($categoria && $id) {
            $itensEstoque = ItensEstoque::where('Categoria', $categoria)
                ->where('ID', $id)
                ->get();
        } elseif ($categoria) {
            $itensEstoque = ItensEstoque::where('Categoria', $categoria)->get();
        } elseif ($id) {
            $itensEstoque = ItensEstoque::where('ID', $id)->get();
        } else {
            $itensEstoque = ItensEstoque::all();
        }
    
        return response()->json($itensEstoque);
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
        $item->created_at = Carbon::now('America/Sao_Paulo')->format('Y-m-d H:i:s');
        $item->updated_at = Carbon::now('America/Sao_Paulo')->format('Y-m-d H:i:s');
        $item->save();

        return response()->json(['message' => 'Item criado com sucesso'], 201);
    }

    public function getAllItems()
    {
        $itensEstoque = ItensEstoque::all();
    
        $itensEstoque->transform(function ($item) {
            $item->created_at = Carbon::parse($item->created_at)->timezone('America/Sao_Paulo')->format('d/m/Y H:i');
            $item->updated_at = Carbon::parse($item->updated_at)->timezone('America/Sao_Paulo')->format('d/m/Y H:i');
            return $item;
        });
    
        return Response::json($itensEstoque, 200, [], JSON_NUMERIC_CHECK);
    }
}
