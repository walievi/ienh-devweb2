<?php

namespace App\Http\Controllers\Categoria;

use App\Http\Controllers\Controller;
use App\Http\Resources\ProdutoResource;
use App\Models\Categoria;

class ApiController extends Controller
{
    public function produtos(Categoria $categoria)
    {
        return response()->json(ProdutoResource::collection($categoria->produtos), 200);
    }
}
