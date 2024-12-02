<?php

namespace app\Http\Controllers\Produto;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProdutoRequest;
use App\Http\Resources\ProdutoResource;
use App\Models\Categoria;
use App\Models\Produto;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class WebController extends Controller
{
    public function index(): View
    {
        return view('produtos.index')
            ->with('produtos', ProdutoResource::collection(Produto::all()));
    }

    public function create(): View
    {
        return view('produtos.form')
            ->with('categorias', Categoria::pluck('nome', 'id'));
    }

    public function store(ProdutoRequest $request): RedirectResponse
    {
        $produto = Produto::create($request->validated());
        return redirect()
            ->route('produtos.show', ['produto' => $produto])
            ->with('success', 'Produto criado com sucesso.');
    }

    public function show(Produto $produto): View
    {
        return view('produtos.show')
            ->with('produto', new ProdutoResource($produto));
    }

    public function edit(Produto $produto): View
    {
        return view('produtos.form')
            ->with('produto', new ProdutoResource($produto))
            ->with('categorias', Categoria::pluck('nome', 'id'));

    }

    public function update(ProdutoRequest $request, Produto $produto): RedirectResponse
    {
        $produto->update($request->validated());

        return redirect()
            ->route('produtos.show', ['produto' => $produto])
            ->with('success', 'Produto atualizado com sucesso.');
    }

    public function destroy(Produto $produto): RedirectResponse
    {
        $produto->delete();

        return redirect()
            ->route('produtos.index')
            ->with('success', 'Produto excluído com sucesso.');
    }
}
