<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index()
    {
        return view('index');
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


