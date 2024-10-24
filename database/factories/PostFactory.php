<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Post;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    protected $model = Post::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'cat_id' => rand(1,10),
            'title'=> fake()->title(),
            'body'=>fake()->text(250),
            'likes'=>rand(1,1000),
            'dislikes'=>rand(1,100)
        ];
    }
}
