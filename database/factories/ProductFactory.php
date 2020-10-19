<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\Product;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Product::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $categories = Category::all();
        $category = $categories->random();
        return [
            'name' => $this->faker->name,
            'description' => $this->faker->sentence,
            'body' => $this->faker->paragraph(5, true),
            'price' => $this->faker->randomFloat(2, 25, 50),
            'category_id' => $category->id,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ];
    }
}
