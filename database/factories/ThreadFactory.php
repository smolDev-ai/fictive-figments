<?php

namespace Database\Factories;

use App\Models\Forum;
use App\Models\Thread;
use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;

class ThreadFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Thread::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            "created_on" => $this->faker->dateTime(),
            "title" => $this->faker->words(4, true),
            "body" => $this->faker->paragraphs(rand(1, 10), true),
            "author" => User::factory()->create(),
            "forum" => Forum::factory()->create(),
            "is_sticky" => $this->faker->boolean(),
            "is_locked" => $this->faker->boolean(),

        ];
    }
}
