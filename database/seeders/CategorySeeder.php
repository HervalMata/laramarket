<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::factory(1)->create([
            'name' => 'Laços',
            'description' => 'Laços fofos e maravilhosos'
        ]);
        Category::factory(1)->create([
            'name' => 'Tiaras',
            'description' => 'Tiaras fofas e maravilhosas'
        ]);
        Category::factory(1)->create([
            'name' => 'Viseiras',
            'description' => 'Viseiras fofas e maravilhosas'
        ]);
        Category::factory(1)->create([
            'name' => 'Faixas Para Bebê',
            'description' => 'Faixas Para Bebê fofas e maravilhosas'
        ]);
        Category::factory(20)->create();
    }
}
