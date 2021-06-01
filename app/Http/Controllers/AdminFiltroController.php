<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminFiltroController extends Controller
{
    //filtros com mais vendido igual a true
    public function maisVendido($status)
    {
        return \App\Produto::withTrashed()->where('status', $status)->with('marca')->with('categoria')->paginate(10);
    }
    public function maisVendidoMarca($status, $marca)
    {
        return \App\Produto::withTrashed()->where('status', $status)->where('marca_id', $marca)->with('marca')->with('categoria')->paginate(10);
    }
    public function maisVendidoCategoria($status, $categoria)
    {
        return \App\Produto::withTrashed()->where('status', $status)->where('categoria_id', $categoria)->with('marca')->with('categoria')->paginate(10);
    }
    public function maisVendidoCategoriaMarca($status, $categoria, $marca)
    {
        return \App\Produto::withTrashed()->where('status', $status)->where('categoria_id', $categoria)->where('marca_id', $marca)->with('marca')->with('categoria')->paginate(10);
    }

    // filtros normais 

    public function FiltroCategoria($categoria)
    {
        return \App\Produto::withTrashed()->where('categoria_id', $categoria)->with('marca')->with('categoria')->paginate(10);
    }
    public function FiltroMarca($marca)
    {
        return \App\Produto::withTrashed()->where('marca_id', $marca)->with('marca')->with('categoria')->paginate(10);
    }
    public function FiltroMarcaCategoria($marca, $categoria)
    {
        return \App\Produto::withTrashed()->where('marca_id', $marca)->where('categoria_id', $categoria)->with('marca')->with('categoria')->paginate(10);
    }
}
