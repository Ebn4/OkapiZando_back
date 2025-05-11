<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Article;
use App\Models\Shop;

/**
 * @extends Factory<Article>
 */
class ArticleFactory extends Factory
{
    protected $model = Article::class;

    public function definition(): array
    {
        return [
            'title' => $this->faker->sentence(),
            'description' => $this->faker->sentence(),
            'details' => $this->faker->sentence(),
            'color' => implode(', ', $this->faker->unique()->randomElements(['Rouge', 'Bleu', 'Vert', 'Jaune', 'Noir', 'Blanc', 'Gris'], 3)),
            'stock' => $this->faker->numberBetween(1, 100),
            'image' => implode(', ', $this->faker->unique()->randomElements(['image1.jpg', 'image2.jpg', 'image3.jpg', 'image4.jpg'], 3)),
            'shop_id' => Shop::inRandomOrder()->first()?->id ?? 1,  // Sécurisé avec valeur par défaut
            'price' => $this->faker->numberBetween(1000, 100000),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
