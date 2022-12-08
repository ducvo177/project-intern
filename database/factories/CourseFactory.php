<?php

namespace Database\Factories;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Course>
 */
class CourseFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => fake()->name(),
            'slug'=>fake()->unique()->slug(),
            'link'=>fake()->url(),
            'price'=>rand(0, 1000) / 100,
            'old_price'=>rand(0, 1000) / 100,
            'created_by'=>rand(0, 1000),
            'category_id'=>fake()->randomElement(Category::pluck('id')),
            'lessons'=>rand(0, 1000),
            'view_count'=>rand(0, 1000),
            'benefits'=>json_encode(["key" => "value"]),
            'fqa'=>json_encode(["key" => "value"]),
            'is_feature'=>rand(0, 1),
            'is_online'=>rand(0, 1),
            'description'=>fake()->text(),
            'content'=>fake()->text(),
            'meta_title'=>fake()->title(),
            'meta_desc'=>fake()->text(),
            'meta_keyword'=>fake()->firstName(),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
