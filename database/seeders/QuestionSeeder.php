<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;
use App\Models\Question;


class QuestionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //\App\Models\Question::factory()->count(100)->create();

        $json = Storage::disk('local')->get('/json/questions.json');
        $questions = json_decode($json, true);

        foreach($questions as $question){
            Question::query()->updateOrCreate([
                'id' => $question['id'],
                'quiz_id' => $question['quiz_id'],
                'question' => $question['question'],
                'answer1' => $question['answer1'],
                'answer2' => $question['answer2'],
                'answer3' => $question['answer3'],
                'answer4' => $question['answer4'],
                'correct_answer' => $question['correct_answer'],
            ]);
        }
    }
}
