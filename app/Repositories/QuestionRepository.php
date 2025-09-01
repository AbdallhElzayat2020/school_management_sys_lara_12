<?php

namespace App\Repositories;

use App\Http\Resources\QuestionResource;
use App\Models\Question;
use App\Interfaces\QuestionInterface;

class QuestionRepository implements QuestionInterface
{
    public function index($quizId)
    {
        $questions = Question::where('quiz_id', $quizId)->get();

        return response()->json([
            'questions' => QuestionResource::collection($questions),
        ], 200);
    }

    public function store($request)
    {
        $question = Question::create([
            'quiz_id' => $request->quiz_id,
            'title' => $request->title,
            'answers' => $request->answers,
            'right_answer' => $request->right_answer,
            'score' => $request->score,
        ]);

        return response()->json([
            'message' => 'Question created successfully',
        ], 200);
    }

    public function update($id, $request)
    {
        $question = Question::find($id);
        if (!$question) {
            return response()->json([
                'message' => 'Question not found',
            ], 404);
        }
        $question->update([
            'quiz_id' => $request->quiz_id,
            'title' => $request->title,
            'answers' => $request->answers,
            'right_answer' => $request->right_answer,
            'score' => $request->score,
        ]);

        return response()->json([
            'message' => 'Question updated successfully',
        ], 200);
    }

    public
    function destroy($id)
    {
        $question = Question::find($id);
        if (!$question) {
            return response()->json([
                'message' => 'Question not found',
            ], 404);
        }
        $question->delete();

        return response()->json([
            'message' => 'Question deleted successfully',
        ], 200);
    }
}
