<?php

namespace Database\Factories;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => User::factory(),
            'category_id' => fake()->randomNumber(1, 10),
            'title' => fake()->sentence(),
            'content' => fake()->paragraph(5),
            'slug' => Str::slug(fake()->unique()->sentence()),
            'published_at' => Carbon::now(),
        ];
    }
}
