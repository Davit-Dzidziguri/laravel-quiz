<?php

namespace App\Http\Controllers;

use App\Models\Quiz;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class QuizController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $quizzes = Quiz::all();
        return view('quiz.index', compact('quizzes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('quiz.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'photo' => 'required',
        ]);
        $quiz = new Quiz();
        $quiz->name = $request->name;
        $quiz->description = $request->description;
        $file = $request->file('photo');
        $filename = $file->getClientOriginalName();
        $filePath = 'images/' . $filename;
        Storage::disk('public')->put($filePath, file_get_contents($file));
        $quiz->photo = $filePath;
        $quiz->save();
        return redirect(route('quiz.index'));
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
        $quiz = Quiz::find($id);
        return view('quiz.edit', compact('quiz'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
        ]);
        $quiz = Quiz::find($id);
        $quiz->name = $request->name;
        $quiz->description = $request->description;
        $quiz->photo = $request->photo;
        $quiz->save();
        return redirect(route('quiz.index'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $quiz = Quiz::find($id);
        $quiz->delete();
        return response()->json(['success', 200]);
    }
}
