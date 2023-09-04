<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;
use App\Models\Quiz;

class QuizSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //\App\Models\Quiz::factory()->count(20)->create();

        
        $json = Storage::disk('local')->get('/json/quizzes.json');
        $quizzes = json_decode($json, true);

        foreach($quizzes as $quiz){
            Quiz::query()->updateOrCreate([
                'id' => $quiz['id'],
                'title' => $quiz['title'],
                'description' => $quiz['description'],
                'slug' => $quiz['slug'],
                'finished_at' => $quiz['finished_at'],
                'duration' => $quiz['duration'],
                'passing_score' => $quiz['passing_score'],
                'status' => $quiz['status'],
                'created_at' => $quiz['created_at'],
            ]);
        }

    }
}
