<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;
use App\Models\Answer;

class AnswerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //\App\Models\Answer::factory()->count(1000)->create();

        $json = Storage::disk('local')->get('/json/answers.json');
        $answers = json_decode($json, true);

        foreach($answers as $answer){
            Answer::query()->updateOrCreate([
                'id' => $answer['id'],
                'user_id' => $answer['user_id'],
                'question_id' => $answer['question_id'],
                'answer' => $answer['answer'],
            ]);
        }

    }
}
