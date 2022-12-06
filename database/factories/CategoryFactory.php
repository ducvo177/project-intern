<?php

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
            'name' => fake()->unique()->name(),
            'slug'=>fake()->unique()->slug(),
            'parent'=>10,
            'created_by'=>10,
            'content'=>fake()->text(),
            'meta_title'=>fake()->name(),
            'meta_desc'=>fake()->name(),
            'meta_keyword'=>fake()->name(),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
