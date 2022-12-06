<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Attachment>
 */
class AttachmentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'file_path' => fake()->filePath(),
            'attachable_type' => fake()->name(),
            'file_name' => fake()->name(),
            'attachable_id' =>"30248",
            'extention' => fake()->fileExtension(),
            'mime_type' => "type",
            'size' => random_int(0, 10),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
