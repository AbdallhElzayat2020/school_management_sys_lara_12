<?php

namespace App\Repositories;

use App\Http\Resources\ExamsResource;
use App\Interfaces\ExamInterface;
use App\Models\Exam;

class ExamRepository implements ExamInterface
{
    public function index()
    {
        $exams = Exam::paginate(9);
        return response()->json([
            'exams' => ExamsResource::collection($exams),
        ], 200);
    }

    public function store($request)
    {
        $exam = Exam::create([
            'name' => [
                'ar' => $request->name['ar'],
                'en' => $request->name['en'],
            ],
            'term' => $request->term,
            'academic_date' => $request->academic_date,
        ]);
        return response()->json([
            'msg' => 'Exam created successfully',
            'exam' => new ExamsResource($exam),
        ], 201);
    }

    public function update($id, $request)
    {
        $exam = Exam::findOrFail($id);

        $exam->update([
            'name' => [
                'ar' => $request->name['ar'],
                'en' => $request->name['en'],
            ],
            'term' => $request->term,
            'academic_date' => $request->academic_date,
        ]);

        return response()->json([
            'msg' => 'Exam updated successfully',
            'exam' => new ExamsResource($exam),
        ], 200);
    }

    public function destroy($id)
    {
        $exam = Exam::findOrFail($id);
        $exam->delete();

        return response()->json([
            'msg' => 'Exam deleted successfully',
        ], 200);
    }
}
