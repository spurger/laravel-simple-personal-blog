<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Article>
 */
class ArticleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $date = fake()->dateTimeBetween('-2 years');

        return [
            'title' => fake()->sentence(),
            'full_text' => fake()->paragraphs(3, true),
            'created_at' => $date,
            'updated_at' => $date,
        ];
    }
}
