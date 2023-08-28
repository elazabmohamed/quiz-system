<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Quiz;
use App\Http\Requests\QuizCreateRequest;
use App\Http\Requests\QuizUpdateRequest;

class QuizController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $quizzes = \App\Models\Quiz::withCount('questions')->paginate(10);
        return view('admin.quiz.list', compact('quizzes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.quiz.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(QuizCreateRequest $request)
    {
        //dd($request);
        Quiz::create($request->post());
        return redirect()->route('quizzes.index')->withSuccess('Quiz Added Successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $quiz= Quiz::find($id) ?? abort(404, 'Quiz not found.');
        return view('admin.quiz.edit', compact('quiz'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(QuizUpdateRequest $request, string $id)
    {
        $quiz= Quiz::find($id) ?? abort(404, 'Quiz not found.');
        Quiz::where('id', $id)->update($request->except(['_method', '_token']));
        return redirect()->route('quizzes.index')->withSuccess('Quiz Updated Successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $quiz= Quiz::find($id) ?? abort(404, 'Quiz not found.');
        $quiz->delete();
        return redirect()->route('quizzes.index')->withSuccess('Quiz Deleted Successfully.');
    }
}
