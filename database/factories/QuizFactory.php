<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Quiz;
use Illuminate\Support\Str;
use Laravel\Jetstream\Features;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Quiz>
 */
class QuizFactory extends Factory
{

    protected $model = Quiz::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => $this->faker->sentence(rand(3, 8)),
            'description'=>$this->faker->text(200),
            'date'=>$this->faker->dateTime($max = 'now', $timezone = null),
            'duration'=>$this->faker->numberBetween($min = 5, $max = 120),
            'passing_score'=>$this->faker->numberBetween($min = 50, $max = 75),
        ];
    }
}
