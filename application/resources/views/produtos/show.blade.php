@extends('general')

@section('content')
<div class="container mt-5">
    <h1 class="mb-4">Detalhes do Produto</h1>

    <div class="card">
        <div class="card-header">
            <h2>{{ $produto->nome }}</h2>
        </div>
        <div class="card-body">
            <p><strong>Descrição:</strong></p>
            <p>{{ $produto->descricao }}</p>

            <p><strong>Preço:</strong> R$ {{ number_format($produto->preco, 2, ',', '.') }}</p>

            <p><strong>Categoria:</strong> {{ $produto->categoria->nome ?? 'Sem categoria' }}</p>
        </div>
        <div class="card-footer d-flex justify-content-end">
            <a href="{{ route('produtos.index') }}" class="btn btn-secondary me-2">Voltar</a>
            <a href="{{ route('produtos.edit', $produto->id) }}" class="btn btn-primary">Editar</a>
        </div>
    </div>
</div>
@endsection
