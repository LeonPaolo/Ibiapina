<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProdutoController extends Controller
{
    public function index()
    {
        $produtos = \App\Produto::withTrashed()->paginate(10);
        $categorias = \App\Categoria::all();
        $marcas = \App\Marca::all();
        return view('admin.produto.lista', compact('produtos', 'categorias', 'marcas'));
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
        $produto->status = $request->vendido;
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
        flash('Produto adiconado com sucesso')->success();
        return redirect()->back();

    }
    public function show($id)
    {
        //
    }
    public function edit($id)
    {
        $categorias = \App\Categoria::all();
        $marcas = \App\Marca::all();
        $produto = \App\Produto::find($id);
        return view('admin.produto.editar', compact('categorias', 'marcas', 'produto'));
    }
    public function update(Request $request, $id)
    {
        $produto = \App\Produto::find($id);
        $produto->nome = $request->nome;
        $produto->descricao = $request->descricao;
        $produto->categoria_id = $request->categoria;
        $produto->marca_id = $request->marca;
        $produto->status = $request->vendido;
        $produto->save();
        $files = $request->file('fotos');
        if($request->hasFile('fotos'))
        {
            foreach($produto->images as $image)
            {
                $imagens = \App\Image::where('produto_id', $id)->delete();
                Storage::disk('public')->delete($image->imagem);
            }
            foreach ($files as $file) 
            {
                $image = new \App\Image();
                $image->imagem = $file->store('produto/'.$produto->id, 'public');
                $image->produto_id = $produto->id;
                $image->save();
            }
        };
        flash('Produto atualizado com sucesso')->success();
        return redirect()->back();
    }
    public function destroy($id)
    {
        $produto = \App\Produto::find($id);
        $produto->delete();
        return redirect()->back();
    }
    public function ativar($id)
    {
        \App\Produto::withTrashed()->where('id', $id)->restore();
        return redirect()->back();
    }
}
