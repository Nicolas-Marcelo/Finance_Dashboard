<?php

namespace App\Http\Controllers;

use App\Models\Usuarios;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UsuarioController extends Controller
{
    public function create()
    {
        return view('usuarios.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nome' => 'required|string|max:255',
            'email' => 'required|email|unique:usuarios,email',
            'senha' => 'required|min:6',
        ]);

        Usuarios::create([
            'nome' => $request->nome,
            'email' => $request->email,
            'senha' => Hash::make($request->senha),
        ]);

        return redirect()->route('usuarios.formlogin')->with('sucesso', 'Conta criada com sucesso!');
    }

    public function formularioLogin()
    {
        return view('usuarios.formlogin');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'senha' => 'required',
        ]);

        $usuario = Usuarios::where('email', $request->email)->first();

        if (!$usuario || !Hash::check($request->senha, $usuario->senha)) {
            return back()->withErrors(['erro' => 'Credenciais inválidas']);
        }

        $token = $usuario->createToken('token-usuario')->plainTextToken;

        session(['token' => $token, 'usuario' => $usuario]);

        return redirect()->route('contas.index');
    }

    public function perfil()
    {
        $usuario = session('usuario');
        if (!$usuario) {
            return redirect()->route('usuarios.login');
        }

        return redirect()->route('contas.index');
    }

    public function logout()
    {
        session()->flush();
        return redirect()->route('usuarios.formlogin');
    }
}
