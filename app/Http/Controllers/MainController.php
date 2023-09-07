<?php

namespace App\Http\Controllers;

use App\Models\Quiz;
use App\Models\Answer;
use App\Models\Result;

use Illuminate\Http\Request;

class MainController extends Controller
{
    public function dashboard(){
        $quizzes = Quiz::where('status','active')->withCount('questions')->paginate(5);

        $results = auth()->user()->results;
        return view('dashboard', compact('quizzes', 'results'));
    }

    public function quiz($slug){

    $quiz = Quiz::whereSlug($slug)->with('questions.my_answers')->first()?? abort(404, 'Quiz not found.');

       if($quiz->my_result){
        return view('quiz_result', compact('quiz'));
       }

        return view('quiz', compact('quiz'));
    }

    public function quiz_detail($slug){

        $filter=request()->get('filter');

        $quiz= Quiz::whereSlug($slug)->with('my_result', 'descResults.user', 'ascResults.user' )->withCount('questions')->first()?? abort(404, 'Quiz not found.');

        return view('quiz_detail', compact('quiz'));
    }

    public function result(Request $request, $slug){
        
        $quiz = Quiz::with('questions')->whereSlug($slug)->first() ?? abort(404, 'Quiz not found.');
        $correct=0;

        if($quiz->my_result){
            abort(404, "You've already taken this quiz.");
            }

        foreach($quiz->questions as $question){
            Answer::create([
                'user_id'=>auth()->user()->id,
                'question_id'=>$question->id,
                'answer'=>$request->post($question->id)
            ]);


            if($question->correct_answer==$request->post($question->id)){
                $correct +=1;
            }
        }

        $score = round((100/count($quiz->questions))*$correct); 
        $wrong = count($quiz->questions)-$correct;

        Result::create([
            'user_id'=>auth()->user()->id,
            'quiz_id'=>$quiz->id,
            'score'=>$score,
            'correct'=>$correct,
            'wrong'=>$wrong,
        ]);

        return redirect()->route('quiz.detail', $quiz->slug)->withSuccess('Quiz was taken successfully. Your score is: '.$score);

    }
}
