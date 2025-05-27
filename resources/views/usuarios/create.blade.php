<!DOCTYPE html>
<html>
<head><title>Registrar</title></head>
<body>
    <h2>Cadastro</h2>
    <form action="{{ route('usuarios.store') }}" method="POST">
        @csrf
        <input type="text" name="nome" placeholder="Nome" required><br>
        <input type="email" name="email" placeholder="Email" required><br>
        <input type="password" name="senha" placeholder="Senha" required><br>
        <button type="submit">Registrar</button>
    </form>
</body>
</html>
