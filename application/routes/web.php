<?php

use App\Http\Controllers\Produto\WebController as ProdutoController;
use Illuminate\Support\Facades\Route;

Route::resource('produtos', ProdutoController::class);
