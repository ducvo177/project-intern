<?php

declare(strict_types=1);

namespace Database\Factories;

use App\Models\Course;
use App\Models\Section;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Lesson>
 */
class LessonFactory extends Factory
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
            'course_id'=>fake()->randomElement(Course::pluck('id')),
            'section_id'=>fake()->randomElement(Section::pluck('id')),
            'video_type'=>random_int(0, 10),
            'video_url'=>fake()->url(),
            'time'=>fake()->date(),
            'preview'=>fake()->boolean(),
            'content'=>fake()->text(),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
