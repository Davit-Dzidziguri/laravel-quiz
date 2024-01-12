<?php

namespace App\Http\Controllers;

use App\Models\Question;
use App\Models\Quiz;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function index(){
        $quizzes = Quiz::all();
         return view('student.index',compact('quizzes'));
    }

    public function quiz($id){
        $quiz =  Quiz::find($id);
        $questions = Question::where('quiz_id', $id)->get();
         return view('student.quiz', compact('questions', 'quiz'));
    }

    public function getData(Request $request){
        $question = Question::find($request->id);
        return ucfirst($question->correct_answer);
    }
}
