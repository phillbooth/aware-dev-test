<?php

namespace Database\Factories;

use App\Models\Joke;
use Illuminate\Database\Eloquent\Factories\Factory;

class JokeFactory extends Factory
{
    protected $model = Joke::class;

    public function definition(): array
    {
        return [
            'joke_id' => $this->faker->uuid,
            'joke' => $this->faker->sentence,
        ];
    }
}
