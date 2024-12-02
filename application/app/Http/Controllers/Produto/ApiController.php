<?php

namespace app\Http\Controllers\Produto;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProdutoRequest;
use App\Http\Resources\ProdutoResource;
use App\Models\Produto;
use Illuminate\Http\JsonResponse;


class ApiController extends Controller
{

    public function index(): JsonResponse
    {
        $produtos = Produto::all();
        return response()->json(ProdutoResource::collection($produtos), 200);
    }

    public function store(ProdutoRequest $request): JsonResponse
    {
        $produto = Produto::create($request->validated());
        return response()->json(new ProdutoResource($produto), 201);
    }


    public function show(Produto $produto): JsonResponse
    {
        return response()->json(new ProdutoResource($produto), 200);
    }

    public function update(ProdutoRequest $request, Produto $produto): JsonResponse
    {
        $produto->update($request->validated());
        return response()->json(new ProdutoResource($produto), 200);
    }

    public function destroy(Produto $produto): JsonResponse
    {
        $produto->delete();
        return response()->json(null, 204);
    }
}
