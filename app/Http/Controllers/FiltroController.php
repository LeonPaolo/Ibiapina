<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FiltroController extends Controller
{
    //filtros com mais vendido igual a true
    public function maisVendido($status)
    {
        return \App\Produto::where('status', $status)->with('marca')->with('categoria')->with('images')->get();
    }
    public function maisVendidoMarca($status, $marca)
    {
        return \App\Produto::where('status', $status)->where('marca_id', $marca)->with('marca')->with('categoria')->with('images')->get();
    }
    public function maisVendidoCategoria($status, $categoria)
    {
        return \App\Produto::where('status', $status)->where('categoria_id', $categoria)->with('marca')->with('categoria')->with('images')->get();
    }
    public function maisVendidoCategoriaMarca($status, $categoria, $marca)
    {
        return \App\Produto::where('status', $status)->where('categoria_id', $categoria)->where('marca_id', $marca)->with('marca')->with('categoria')->with('images')->get();
    }

    // filtros normais 

    public function FiltroCategoria($categoria)
    {
        return \App\Produto::where('categoria_id', $categoria)->with('marca')->with('categoria')->with('images')->get();
    }
    public function FiltroMarca($marca)
    {
        return \App\Produto::where('marca_id', $marca)->with('marca')->with('categoria')->with('images')->get();
    }
    public function FiltroMarcaCategoria($marca, $categoria)
    {
        return \App\Produto::where('marca_id', $marca)->where('categoria_id', $categoria)->with('marca')->with('categoria')->with('images')->get();
    }

    //Busca por produto

    public function busca($produto)
    {
        return \App\Produto::where('nome', 'like', '%'.$produto.'%')->with('marca')->with('categoria')->with('images')->get();    
    }
}
