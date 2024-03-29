<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Http\Requests\MarcaRequest;

class MarcaController extends Controller
{
    public function index()
    {
        $marcas = \App\Marca::paginate(10);
        return view('admin.marca.lista', compact('marcas'));
    }
    public function create()
    {
        return view('admin.marca.adicionar');
    }
    public function store(MarcaRequest $request)
    {
        $marca = new \App\Marca();
        $marca->nome = $request->nome;
        $marca->save();
        flash('Marca adiconada com sucesso')->success();
        return redirect()->back();
    }
    public function show($id)
    {
        //
    }
    public function edit($id)
    {
        $marca = \App\Marca::find($id);
        return view('admin.marca.editar', compact('marca'));
    }
    public function update(Request $request, $id)
    {
        $request->validate([
            'nome' => Rule::unique('marcas')->ignore($id),
        ]);
        $marca = \App\Marca::find($id);
        $marca->nome = $request->nome;
        $marca->save();
        flash('Marca editada com sucesso')->success();
        return redirect()->back();
    }
    public function destroy($id)
    {
        //
    }
}
