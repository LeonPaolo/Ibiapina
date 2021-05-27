<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class IndexController extends Controller
{
    public function index()
    {
        $plus = \App\Produto::where('status', 's')->paginate(4);
        $produtos = \App\Produto::paginate(8);
        return view('index', compact('produtos', 'plus'));
    }

    public function detalhesProdutos($id)
    {
        $produto = \App\Produto::find($id);
        $produtos = \App\Produto::where('id', '<>', $produto->id)->paginate(4);

        return view('descricao', compact('produto', 'produtos'));
    }

    public function produtos()
    {
        $produtos = \App\Produto::all();
        $marcas = \App\Marca::all();
        $categorias = \App\Categoria::all();
        return view('listarProdutos', compact('produtos', 'marcas', 'categorias'));
    }
}


