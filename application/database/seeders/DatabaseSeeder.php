<?php

namespace Database\Seeders;

use App\Models\Categoria;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        Categoria::factory()
            ->count(5)
            ->hasProdutos(10)
            ->create();
    }
}
