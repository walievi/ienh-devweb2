<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

use \App\Models\Categoria;
use \App\Models\Produto;

class CategoriaFactory extends Factory
{
    protected $model = Categoria::class;

    public function definition()
    {
        return [
            'nome'      => $this->faker->word(),
            'descricao' => $this->faker->sentence(8),
        ];
    }

    public function hasProdutos(int $count = 5)
    {
        return $this->has(Produto::factory()->count($count), 'produtos');
    }
}
