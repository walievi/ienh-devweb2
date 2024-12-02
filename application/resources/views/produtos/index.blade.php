@extends('general')

@section('content')
    <h1>Produtos</h1>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Nome</th>
                <th>Descrição</th>
                <th>Preço</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($produtos as $produto)
                <td>
                    <td><a href="{{ route('produtos.show', ['produto' => $produto]) }}">{{ $produto->nome }}</a></td>
                    <td>{{ $produto->descricao }}</td>
                    <td>{{ $produto->preco }}</td>
                    <td>
                        <a href="{{ route('produtos.edit', ['produto' => $produto]) }}" class="btn btn-primary">Editar</a>
                        <form action="{{ route('produtos.destroy', ['produto' => $produto]) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" onclick="return confirm('Tem certeza que deseja remover este produto?')">
                                <i class="fa fa-trash"></i> Remover
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
@endsection
