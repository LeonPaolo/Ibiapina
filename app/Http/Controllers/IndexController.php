<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index()
    {
        $produtos = \App\Produto::paginate(8);
        // return dd($produtos);
        return view('index', compact('produtos'));
    }

    public function detalhesProdutos()
    {
        return view('descricao');
    }

    public function produtos()
    {
        return view('listarProdutos');
    }
}


