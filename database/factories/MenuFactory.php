<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class MenuFactory extends Factory
{
    /**
     * Define the model's default state.
     *
   * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => mt_rand(1, 3),
            'category_id' => mt_rand(1, 4),
            'name' => $this->faker->sentence(3),
            'slug' => $this->faker->slug(),
            'image' => $this->faker->imageUrl(640, 480, 'room', true),
            'price' => $this->faker->numberBetween(100000, 1000000),
            'published_at' => $this->faker->optional()->dateTime(),
        ];
    }
}
