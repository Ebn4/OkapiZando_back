<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Shop;


class shopSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
       

    Shop::factory()->count(10)->create();

    //Shop::factory()->count(30)->create(); 
    }
}
