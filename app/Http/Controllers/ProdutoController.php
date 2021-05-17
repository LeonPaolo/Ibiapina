<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProdutoController extends Controller
{
    public function index()
    {
        $produtos = \App\Produto::paginate(10);
        return view('admin.produto.lista', compact('produtos'));
    }
    public function create()
    {
        $categorias = \App\Categoria::all();
        $marcas = \App\Marca::all();
        return view('admin.produto.adicionar', compact('categorias', 'marcas'));
    }
    public function store(Request $request)
    {
        $produto = new \App\Produto;
        $produto->nome = $request->nome;
        $produto->descricao = $request->descricao;
        $produto->categoria_id = $request->categoria;
        $produto->marca_id = $request->marca;
        $produto->user_id = auth()->user()->id;
        $produto->save();
        $files = $request->file('fotos');
        if($request->hasFile('fotos'))
        {
            foreach ($files as $file) 
            {
                $image = new \App\Image();
                $image->imagem = $file->store('produto/'.$produto->id, 'public');
                $image->produto_id = $produto->id;
                $image->save();
            }
        };
        flash('Produto adiconada com sucesso')->success();
        return redirect()->back();

    }
    public function show($id)
    {
        //
    }
    public function edit($id)
    {
        //
    }
    public function update(Request $request, $id)
    {
        //
    }
    public function destroy($id)
    {
        //
    }
}
