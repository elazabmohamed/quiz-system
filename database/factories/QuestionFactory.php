<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Question;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Question>
 */
class QuestionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'quiz_id'=>rand(1,10),
            'question'=>$this->faker->text(200),
            'answer1'=>$this->faker->text(30),
            'answer2'=>$this->faker->text(30),
            'answer3'=>$this->faker->text(30),
            'answer4'=>$this->faker->text(30),
            'correct_answer'=>'answer'.rand(1, 4)
        ];
    }
}
