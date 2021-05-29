<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Http\Requests\CategoriaRequest;

class CategoriaController extends Controller
{
    public function index()
    {
        $categorias = \App\Categoria::paginate(10);
        return view('admin.categoria.lista', compact('categorias'));
    }
    public function create()
    {
        return view('admin.categoria.adicionar');
    }
    public function store(CategoriaRequest $request)
    {
        $categoria = new \App\Categoria();
        $categoria->nome = $request->nome;
        $categoria->save();
        flash('Categoria adiconada com sucesso')->success();
        return redirect()->back();
    }
    public function show($id)
    {
        //
    }
    public function edit($id)
    {
        $categoria = \App\Categoria::find($id);
        return view('admin.categoria.editar', compact('categoria'));
    }
    public function update(Request $request, $id)
    {
        $request->validate([
            'nome' => Rule::unique('categorias')->ignore($id),
        ]);
        $categoria = \App\Categoria::find($id);
        $categoria->nome = $request->nome;
        $categoria->save();
        flash('Categoria editada com sucesso')->success();
        return redirect()->back();
    }
    public function destroy($id)
    {
        //
    }
}
