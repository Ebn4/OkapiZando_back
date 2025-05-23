<?php

namespace Database\Factories;
use App\Models\Shop ;  
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\shops>
 */
class ShopFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->name , 
            'address' => $this->faker->address , 
            'owner_id' => User::all()->random()->id ,
            'created_at' => now() , 
            'updated_at' => now() , 
        ];
    }
}
