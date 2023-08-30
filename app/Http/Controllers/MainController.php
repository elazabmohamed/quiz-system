<?php

namespace App\Http\Controllers;

use App\Models\Quiz;

use Illuminate\Http\Request;

class MainController extends Controller
{
    public function dashboard(){
        $quizzes = Quiz::where('status','active')->withCount('questions')->paginate(5);
        return view('dashboard', compact('quizzes'));
    }
}
