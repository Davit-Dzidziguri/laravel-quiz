<?php

namespace App\Http\Controllers;

use App\Models\Question;
use App\Models\Quiz;
use Illuminate\Http\Request;

class QuestionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

         $questions =  Question::all();
        return view('question.index',compact('questions'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $quiz = Quiz::pluck('name', 'id')->toArray();
        return view('question.create', compact('quiz'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'quiz_id' => 'required',
            'question_name' => 'required',
            'a' => 'required',
            'b' => 'required',
            'c' => 'required',
            'd' => 'required',
            'correct_answer' => 'required',

        ]);
        $question = new Question();
        $question->quiz_id = $request->quiz_id;
        $question->question_name = $request->question_name;
        $question->a = $request->a;
        $question->b = $request->b;
        $question->c = $request->c;
        $question->d = $request->d;
        $question->correct_answer = $request->correct_answer;
        $question->save();
        return redirect(route('question.index'));
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
        $quiz = Quiz::pluck('name', 'id')->toArray($id);
        $question = Question::find($id);
        return view('question.edit', compact('quiz','question'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'quiz_id' => 'required',
            'question_name' => 'required',
            'a' => 'required',
            'b' => 'required',
            'c' => 'required',
            'd' => 'required',
            'correct_answer' => 'required',

        ]);
        $question = Question::find($id);
        $question->quiz_id = $request->quiz_id;
        $question->question_name = $request->question_name;
        $question->a = $request->a;
        $question->b = $request->b;
        $question->c = $request->c;
        $question->d = $request->d;
        $question->correct_answer = $request->correct_answer;
        $question->save();
        return redirect(route('question.index'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $question = Question::find($id);
        $question->delete();
        return response()->json(['success', 200]);
    }
}
