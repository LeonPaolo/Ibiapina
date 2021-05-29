<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $produtos = \App\Produto::all();
        $categorias = \App\Categoria::all();
        $marcas = \App\Marca::all();
        return view('home', compact('produtos', 'categorias', 'marcas'));
    }
}
