<?php
namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ProdutoFactory extends Factory
{
    protected $model = \App\Models\Produto::class;

    public function definition()
    {
        return [
            'nome'      => $this->faker->word() . ' ' . $this->faker->randomElement(['Pro', 'Max', 'Lite', 'Plus']),
            'descricao' => $this->faker->sentence(10),
            'preco'     => $this->faker->randomFloat(2, 10, 5000),
        ];
    }
}
