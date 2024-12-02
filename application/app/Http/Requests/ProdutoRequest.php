<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProdutoRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'nome'        => 'required|string|max:255',
            'preco'       => 'required|numeric|min:0.01',
            'descricao'   => 'required|string|max:1000',
            'categoria_id'=> 'required|exists:categorias,id',
        ];
    }

    public function messages(): array
    {
        return [
            'nome.required'        => 'O campo nome é obrigatório.',
            'nome.max'             => 'O nome deve ter no máximo 255 caracteres.',
            'preco.required'       => 'O campo preço é obrigatório.',
            'preco.numeric'        => 'O preço deve ser um número.',
            'preco.min'            => 'O preço deve ser maior que 0.',
            'descricao.required'   => 'O campo descrição é obrigatório.',
            'descricao.max'        => 'A descrição deve ter no máximo 1000 caracteres.',
            'categoria_id.required'=> 'O campo categoria é obrigatório.',
            'categoria_id.exists'  => 'A categoria selecionada é inválida.',
        ];
    }
}
