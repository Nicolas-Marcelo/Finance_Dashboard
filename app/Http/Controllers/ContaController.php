<?php

namespace App\Http\Controllers;

use App\Models\Contas;
use Illuminate\Http\Request;

class ContaController extends Controller
{
    public function index()
    {
        $usuario = session('usuario');
        $contas = $usuario->contas; // usando o relacionamento
        return view('contas.index', compact('contas'));
    }

    public function create()
    {
        return view('contas.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nome_conta' => 'required|string|max:255',
            'valor_conta' => 'required|numeric'
        ]);

        $usuario = session('usuario');

        Contas::create([
            'nome_conta' => $request->nome_conta,
            'valor_conta' => $request->valor_conta,
            'usuario_id' => $usuario->id
        ]);

        $usuarioAtualizado = \App\Models\Usuarios::with('contas')->find($usuario->id);
        session(['usuario' => $usuarioAtualizado]);

        return redirect()->route('contas.index')->with('sucesso', 'Conta criada com sucesso!');
    }
}
