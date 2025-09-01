<?php

namespace App\Repositories;

use App\Http\Resources\QuizzesResource;
use App\Interfaces\QuizzesInterface;
use App\Models\Quizze;

class QuizzesRepository implements QuizzesInterface
{
    public function index()
    {
        $quizzes = Quizze::with(['teacher', 'grade', 'classroom', 'section', 'subject'])->paginate();
        return response()->json([
            'quizzes' => QuizzesResource::collection($quizzes),
        ]);
    }

    public function store($request)
    {
        $quiz = Quizze::create([
            'name' => $request->input('name'),
            'subject_id' => $request->input('subject_id'),
            'grade_id' => $request->input('grade_id'),
            'classroom_id' => $request->input('classroom_id'),
            'section_id' => $request->input('section_id'),
            'teacher_id' => $request->input('teacher_id'),
        ]);

        if (!$quiz) {
            return response()->json(['message' => 'Quiz creation failed'], 500);
        }

        return response()->json([
            'message' => 'Quiz created successfully',
            'quiz' => new QuizzesResource($quiz)
        ], 201);
    }

    public function update($id, $request)
    {
        $quiz = Quizze::find($id);
        if (!$quiz) {
            return response()->json(['message' => 'Quiz not found'], 404);
        }

        $quiz->update([
            'name' => $request->input('name'),
            'subject_id' => $request->input('subject_id'),
            'grade_id' => $request->input('grade_id'),
            'classroom_id' => $request->input('classroom_id'),
            'section_id' => $request->input('section_id'),
            'teacher_id' => $request->input('teacher_id'),
        ]);

        return response()->json([
            'message' => 'Quiz updated successfully',
            'quiz' => new QuizzesResource($quiz)
        ], 200);
    }

    public function destroy($id)
    {
        $quiz = Quizze::find($id);
        if (!$quiz) {
            return response()->json(['message' => 'Quiz not found'], 404);
        }

        $quiz->delete();
        return response()->json(['message' => 'Quiz deleted successfully'], 200);
    }
}
