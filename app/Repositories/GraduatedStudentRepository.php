<?php

namespace App\Repositories;

use App\Interfaces\GraduatedStudentInterface;
use App\Models\Grade;
use App\Models\Student;

class GraduatedStudentRepository implements GraduatedStudentInterface
{

    public function index()
    {
        return Student::onlyTrashed()->get();
    }

    public function create()
    {
        return Grade::all();
    }

    public function softDelete($request)
    {
        $students = Student::where('grade_id', $request->grade_id)
            ->where('classroom_id', $request->classroom_id)
            ->where('section_id', $request->section_id)
            ->get();

        if ($students->count() < 1) {
            flash()->error('No students found in the selected criteria.');
            return redirect()->back();
        }

        foreach ($students as $student) {
            $ids = explode(',', $student->id);
            Student::whereIn('id', $ids)->delete();
        }
        flash()->success('Students graduated successfully.');
        return back();
    }

    public function restoreStudent($id)
    {
        $student = Student::withTrashed()->where('id', $id)->first();
        if (!$student) {
            flash()->error('Student not found.');
            return redirect()->back();
        }
        $student->restore();
        flash()->success('Student returned successfully.');
        return back();
    }

    public function forceDelete($id)
    {
        $student = Student::withTrashed()->where('id', $id)->first();
        if (!$student) {
            flash()->error('Student not found.');
            return redirect()->back();
        }
        $student->forceDelete();
        flash()->success('Student permanently deleted.');
        return back();
    }

}
