<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\Usuarios;

class AuthController extends Controller
{
    public function showRegistrarForm()
    {
        return view('registrar');
    }

    public function showLoginForm()
    {
        return view('login');
    }

    public function registrar(Request $request)
    {
        $request->validate([
            'nome' => 'required|string',
            'email' => 'required|email|unique:usuarios',
            'senha' => 'required|min:6'
        ]);

        $usuario = Usuarios::create([
            'nome' => $request->nome,
            'email' => $request->email,
            'senha' => Hash::make($request->senha),
        ]);

        return redirect('/login')->with('sucesso', 'Conta criada com sucesso!');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'senha' => 'required'
        ]);

        $usuario = Usuarios::where('email', $request->email)->first();

        if (!$usuario || !Hash::check($request->senha, $usuario->senha)) {
            return back()->withErrors(['erro' => 'Credenciais inválidas']);
        }

        $token = $usuario->createToken('token-usuario')->plainTextToken;

        session(['token' => $token, 'usuario' => $usuario]);

        return redirect('/perfil');
    }

    public function perfil()
    {
        if (!session('usuario')) {
            return redirect('/login');
        }

        return view('perfil', ['usuario' => session('usuario')]);
    }

    public function logout()
    {
        if (session('usuario')) {
            session()->flush();
        }

        return redirect('/login');
    }
}
