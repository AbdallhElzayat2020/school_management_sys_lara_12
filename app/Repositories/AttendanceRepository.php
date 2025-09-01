<?php

namespace App\Repositories;

use App\Models\Grade;
use App\Models\Student;
use App\Models\Attendance;
use App\Interfaces\AttendanceInterface;
use App\Http\Resources\AttendanceResource;
use App\Http\Resources\GradesResource;

class AttendanceRepository implements AttendanceInterface
{
    public function index()
    {
        $grades = Grade::with('sections')->get();

        return response()->json([
            'grades' => GradesResource::collection($grades),
        ], 200);
    }

    public function show($id): \Illuminate\Http\JsonResponse
    {
        $students = Student::with('attendance')->where('section_id', $id)->get();
        return response()->json([
            'students' => AttendanceResource::collection($students),
        ], 200);
    }


    public function store($request)
    {
        try {
            foreach ($request->attendances as $studentId => $attendance) {
                Attendance::create(
                    [
                        'student_id' => $studentId,
                        'attendance_date' => $request->attendance_date,
                        'grade_id' => $request->grade_id,
                        'classroom_id' => $request->classroom_id,
                        'section_id' => $request->section_id,
                        'teacher_id' => auth()->guard('teacher')->user()->id,
                        'status' => $attendance['status'],
                    ]
                );
            }

            return response()->json(['message' => 'Attendance created successfully'], 201);
        } catch (\Throwable $th) {
            return response()->json(['error' => 'Failed to create attendance'], 500);
        }
    }

    public function edit($id)
    {
        // TODO: Implement edit() method.
    }

    public function update($id, $request)
    {
        // TODO: Implement update() method.
    }

    public function destroy($id)
    {
        // TODO: Implement destroy() method.
    }
}
