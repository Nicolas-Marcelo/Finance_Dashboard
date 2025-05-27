<!DOCTYPE html>
<html>
<head>
    <title>Cadastrar Conta</title>
</head>
<body>
    <h2>Nova Conta</h2>

    @if($errors->any())
        <ul>
            @foreach($errors->all() as $erro)
                <li>{{ $erro }}</li>
            @endforeach
        </ul>
    @endif

    <form action="{{ route('contas.store') }}" method="POST">
        @csrf
        <input type="text" name="nome_conta" placeholder="Nome da conta"><br>
        <input type="number" step="0.01" name="valor_conta" placeholder="Valor da conta"><br>
        <button type="submit">Salvar</button>
    </form>

    <br>
    <a href="{{ route('contas.index') }}">Voltar para a lista</a>
</body>
</html>
