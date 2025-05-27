<!DOCTYPE html>
<html>
<head><title>Perfil</title></head>
<body>
    <h2>Bem-vindo, {{ $usuario->nome }}</h2>
    <p>Email: {{ $usuario->email }}</p>

    <form action="{{ route('usuarios.logout') }}" method="POST">
        @csrf
        <button type="submit">Sair</button>
    </form>
</body>
</html>
