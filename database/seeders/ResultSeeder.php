<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;
use App\Models\Result;

class ResultSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //\App\Models\Result::factory()->count(20)->create();

        $json = Storage::disk('local')->get('/json/results.json');
        $results = json_decode($json, true);

        foreach($results as $result){
            Result::query()->updateOrCreate([
                'id' => $result['id'],
                'user_id' => $result['user_id'],
                'quiz_id' => $result['quiz_id'],
                'score' => $result['score'],
                'correct' => $result['correct'],
                'wrong' => $result['wrong'],
                'score' => $result['score'],
            ]);
        }
    }
}
  