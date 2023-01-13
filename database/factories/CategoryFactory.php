<?php

declare(strict_types=1);

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Category>
 */
class CategoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => fake()->unique()->lastName(),
            'slug'=>fake()->unique()->slug(),
            'parent'=>random_int(0, 100),
            'created_by'=>random_int(0, 100),
            'content'=>fake()->text(),
            'meta_title'=>fake()->title(),
            'meta_desc'=>fake()->text(),
            'meta_keyword'=>fake()->firstName(),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
