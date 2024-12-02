@extends('general')

@section('content')
<div class="container mt-5">
    <h1 class="mb-4">{{ isset($produto) ? 'Editar Produto' : 'Criar Produto' }}</h1>

    <form action="{{ isset($produto) ? route('produtos.update', $produto->id) : route('produtos.store') }}" method="POST">
        @csrf
        @if(isset($produto))
            @method('PUT')
        @endif

        <div class="mb-3">
            <label for="nome" class="form-label">Nome do Produto</label>
            <input type="text" class="form-control @error('nome') is-invalid @enderror" id="nome" name="nome"
                   value="{{ old('nome', $produto->nome ?? '') }}" placeholder="Digite o nome do produto" required>
            @error('nome')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="descricao" class="form-label">Descrição</label>
            <textarea class="form-control @error('descricao') is-invalid @enderror" id="descricao" name="descricao"
                      placeholder="Digite a descrição do produto" rows="4" required>{{ old('descricao', $produto->descricao ?? '') }}</textarea>
            @error('descricao')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="preco" class="form-label">Preço</label>
            <input type="number" class="form-control @error('preco') is-invalid @enderror" id="preco" name="preco"
                   value="{{ old('preco', $produto->preco ?? '') }}" placeholder="Digite o preço" step="0.01" required>
            @error('preco')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="categoria_id" class="form-label">Categoria</label>
            <select class="form-select @error('categoria_id') is-invalid @enderror" id="categoria_id" name="categoria_id" required>
                <option value="" disabled {{ old('categoria_id', $produto->categoria_id ?? '') === null ? 'selected' : '' }}>Selecione uma categoria</option>
                @foreach ($categorias as $id => $nome)
                    <option value="{{ $id }}" {{ old('categoria_id', $produto->categoria_id ?? '') == $id ? 'selected' : '' }}>
                        {{ $nome }}
                    </option>
                @endforeach
            </select>
            @error('categoria_id')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="d-flex justify-content-end">
            <a href="{{ route('produtos.index') }}" class="btn btn-secondary me-2">Cancelar</a>
            <button type="submit" class="btn btn-primary">{{ isset($produto) ? 'Atualizar' : 'Salvar' }}</button>
        </div>
    </form>
</div>
@endsection
