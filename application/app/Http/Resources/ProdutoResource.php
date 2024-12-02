<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ProdutoResource extends JsonResource
{
    public function toArray($request): array
    {
        return [
            'id'            => $this->id,
            'nome'          => $this->nome,
            'preco'         => $this->preco,
            'categoria'     => $this->categoria->nome,
            'criado_em'     => $this->created_at,
            'atualizado_em' => $this->updated_at,
        ];
    }
}
