<?php

namespace App\Repositories;

use App\Http\Resources\SubjectsResource;
use App\Interfaces\SubjectsInterface;
use App\Models\Subject;

class SubjectsRepository implements SubjectsInterface
{
    public function index()
    {
        $subjects = Subject::paginate();

        return response()->json([
            'subjects' => SubjectsResource::collection($subjects)
        ]);
    }

    public function create() {}

    public function store($request)
    {
        Subject::create([
            'name' => [
                'en' => $request->name['en'],
                'ar' => $request->name['ar']
            ],
            'grade_id' => $request->grade_id,
            'classroom_id' => $request->classroom_id,
            'teacher_id' => $request->teacher_id,
        ]);

        return response()->json([
            'msg' => 'Subject created successfully',
        ], 201);
    }

    public function edit($id)
    {
        // body
    }

    public function update($id, $request)
    {
        $subject = Subject::findOrFail($id);
        $subject->update([
            'name' => [
                'en' => $request->name['en'],
                'ar' => $request->name['ar']
            ],
            'grade_id' => $request->grade_id,
            'classroom_id' => $request->classroom_id,
            'teacher_id' => $request->teacher_id,
        ]);

        return response()->json([
            'msg' => 'Subject updated successfully',
        ]);
    }

    public function destroy($id)
    {
        $subject = Subject::findOrFail($id);
        $subject->delete();

        return response()->json([
            'msg' => 'Subject deleted successfully',
        ]);
    }
}
