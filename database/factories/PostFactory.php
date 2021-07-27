<?php

namespace Database\Factories;

use App\Models\Post;
use App\Models\Thread;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class PostFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Post::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            "posted_on" => $this->faker->dateTime(),
            "author" => User::factory()->create(),
            "thread_id" => Thread::factory()->create(),
            "body" => $this->faker->paragraphs(rand(1, 10), true),
        ];
    }
}
