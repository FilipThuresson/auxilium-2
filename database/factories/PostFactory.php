<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

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
            'title' => fake()->sentence(),
            'user_id' => 1,
            'content' => '<p>Hur kan jag l&ouml;sa detta problem?</p><p><img src="https://vidma.se/wp-content/uploads/2018/08/Sk%C3%A4rmklipp.png"></p><p>Jag har ett riktigt problem med att f&ouml;rst&aring; de olika stegen?</p>',
        ];
    }
}
