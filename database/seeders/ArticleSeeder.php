<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ArticleSeeder extends Seeder
{
    public function run(): void
    {
        // Exemple de seed :
         \App\Models\Article::factory()->count(10)->create();
    }
}
