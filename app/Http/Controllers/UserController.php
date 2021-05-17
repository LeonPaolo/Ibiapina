<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function create()
    {
        $user = \App\User::find(auth()->user()->id);
        return view('admin.dados', compact('user'));
    }
    public function senha(Request $request, $id)
    {
        $user = \App\User::find($id);
        $user->password = $request->senha;
        $user->save();
        flash('Senha atualizados com sucesso')->success();
        return redirect()->back();
    }
    public function update(Request $request, $id)
    {
        $user = \App\User::find($id);
        $user->name = $request->nome;
        $user->email = $request->email;
        $user->save();
        flash('Dados atualizados com sucesso')->success();
        return redirect()->back();
    }
}
