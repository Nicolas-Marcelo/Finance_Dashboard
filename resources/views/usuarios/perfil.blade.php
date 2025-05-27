<!DOCTYPE html>
<html>
<head>
    <title>Perfil do Usuário</title>
</head>
<body>
    <h2>Perfil do Usuário</h2>

    @if($usuario)
        <p><strong>Nome:</strong> {{ $usuario->nome }}</p>
        <p><strong>Email:</strong> {{ $usuario->email }}</p>

        <form method="POST" action="{{ route('usuarios.logout') }}">
            @csrf
            <button type="submit">Logout</button>
        </form>

        <a href="{{ route('contas.index') }}">Ver Minhas Contas</a>
    @else
        <p>Você não está logado.</p>
        <a href="{{ route('usuarios.formlogin') }}">Fazer Login</a>
    @endif
</body>
</html>
