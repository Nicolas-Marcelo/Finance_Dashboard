<!DOCTYPE html>
<html>
<head>
    <title>Minhas Contas</title>
</head>
<body>
    <h2>Minhas Contas</h2>

    @if(session('sucesso'))
        <p style="color: green;">{{ session('sucesso') }}</p>
    @endif

    <a href="{{ route('contas.create') }}">Nova Conta</a> |
    <a href="{{ route('usuarios.perfil') }}">Voltar ao Perfil</a>

    <ul>
        @forelse($contas as $conta)
            <li>
                <strong>{{ $conta->nome_conta }}</strong> - R$ {{ number_format($conta->valor_conta, 2, ',', '.') }}
            </li>
        @empty
            <p>Você ainda não cadastrou nenhuma conta.</p>
        @endforelse
    </ul>
</body>
</html>
