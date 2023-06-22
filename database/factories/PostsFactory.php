<?php

namespace Database\Factories;

use App\Models\Categories;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class PostsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $categories = Categories::all();

        return [
            'title' => Str::random(15),
            'description' => Str::random(50),
            'category_id' => function() use ($categories){
                return $categories->random()->id;
            },
            'created_at' => $this->faker->unixTime()
        ];
    }
}
