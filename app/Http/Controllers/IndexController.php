<?php

namespace App\Http\Controllers;
use App\Mail\ClientMail;
use App\Mail\SeedMail;
use Illuminate\Support\Facades\Mail;
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
        $produtos = \App\Produto::where('id', '<>', $produto->id)->where('categoria_id', $produto->categoria_id)->paginate(4);

        return view('descricao', compact('produto', 'produtos'));
    }

    public function produtos()
    {
        $produtos = \App\Produto::all();
        $marcas = \App\Marca::all();
        $categorias = \App\Categoria::all();
        return view('listarProdutos', compact('produtos', 'marcas', 'categorias'));
    }

    public function form(Request $request)
    {

            $teste = new \App\Produto();
            $teste -> nome = $request->nome;
            $teste -> email = $request->email;
            $teste -> mensagem = $request->mensagem;
            Mail::to($teste->email)->send(new ClientMail($teste));
            Mail::to('ibiapinadescartaveis64@gmail.com')->send(new SeedMail($teste));
            flash('Mensagem recebida com Sucesso!')->success();
            return redirect()->back();
    }
}


