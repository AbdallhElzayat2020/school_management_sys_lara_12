<?php

namespace App\Repositories;

use App\Interfaces\StudentPromotionsInterface;
use App\Models\Grade;
use App\Models\Promotion;
use App\Models\Student;
use Illuminate\Support\Facades\DB;

class StudentPromotionsRepository implements StudentPromotionsInterface
{
    public function index()
    {
        return Grade::all();
    }

    public function store($request)
    {
        $students = Student::where('grade_id', $request->grade_id)
            ->where('classroom_id', $request->classroom_id)
            ->where('section_id', $request->section_id)
            ->get();

        if ($students->count() < 1) {
            return redirect()->back()->with('error_promotions', __('لاتوجد بيانات في جدول الطلاب'));
        }

        try {
            DB::beginTransaction();

            foreach ($students as $student) {
                $ids = explode(',', $student->id);
                Student::whereIn('id', $ids)->update([
                    'grade_id' => $request->grade_id_new,
                    'classroom_id' => $request->classroom_id_new,
                    'section_id' => $request->section_id_new,
                ]);

                Promotion::updateOrCreate([
                    'student_id' => $student->id,
                    'from_grade_id' => $request->grade_id,
                    'from_classroom_id' => $request->classroom_id,
                    'from_section_id' => $request->section_id,
                    'to_grade_id' => $request->grade_id_new,
                    'to_classroom_id' => $request->classroom_id_new,
                    'to_section_id' => $request->section_id_new,
                ]);
            }

            DB::commit();
            flash()->success(__('tables.success_msg'));
            return back();

        } catch (\Exception $e) {
            DB::rollback();
            flash()->error(__('tables.error_msg'));
            return back();
        }
    }
}
