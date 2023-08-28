<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Question;
use App\Models\Quiz;
use App\Http\Requests\QuestionRequest;
class QuestionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(string $id)
    {
        $quiz = Quiz::whereId($id)->with('questions')->first() ?? abort(404, 'Quiz not found');
        return view('admin.question.list', compact('quiz'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($quiz_id)
    {
        $quiz=Quiz::find($quiz_id);
        return view('admin.question.create', compact('quiz'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(QuestionRequest $request, string $id)
    {
        //return $request;
        Quiz::find($id)->questions()->create($request->post());
        return redirect()->route('questions.index', $id)->withSuccess('Question Added Successfully.');


    }

    /**
     * Display the specified resource.
     */
    public function show(string $quiz_id, string $id)
    {
        return  $quiz_id .'-'.$id;
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $quiz_id, string $question_id)
    {
        $question =  Quiz::find($quiz_id)->questions()->whereId($question_id)->first() ?? abort(404, 'Quiz or question not found.');
        return view('admin.question.edit', compact('question'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(QuestionRequest $request, string $quiz_id, string $question_id)
    {
        Quiz::find($quiz_id)->questions()->whereId($question_id)->first()->update($request->post());
        return redirect()->route('questions.index', $quiz_id)->withSuccess('Question Edited Successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy( string $quiz_id, string $question_id)
    {
        $question= Quiz::find($quiz_id)->questions()->whereId($question_id)->first() ?? abort(404, 'Question not found.');
        $question->delete();
        return redirect()->route('questions.index', $quiz_id)->withSuccess('Question Deleted Successfully.');
    }
}
