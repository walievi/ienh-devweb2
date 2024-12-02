<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Categoria\ApiController as CategoriaController;
use App\Http\Controllers\Produto\ApiController as ProdutoController;


Route::apiResource('produtos', ProdutoController::class);

Route::name('categorias.')->prefix('categorias')->group(function () {
    Route::name('produtos')->get('{categoria}/produtos', [CategoriaController::class, 'produtos']);
});
