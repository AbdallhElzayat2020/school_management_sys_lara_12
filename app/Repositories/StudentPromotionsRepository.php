<?php

namespace App\Repositories;

use App\Interfaces\StudentPromotionsInterface;
use App\Models\Classroom;
use App\Models\Grade;
use App\Models\Promotion;
use App\Models\Section;
use App\Models\Student;
use Illuminate\Support\Facades\DB;

class StudentPromotionsRepository implements StudentPromotionsInterface
{
    public function index()
    {
        return Grade::all();
    }

    public function create()
    {
        return Promotion::with(['student', 'fromClassroom', 'fromGrade', 'fromSection', 'toClassroom', 'toGrade', 'toSection'])->get();
    }

    public function store($request)
    {
        $request->validate([
            'grade_id' => 'required|exists:grades,id',
            'classroom_id' => 'required|exists:classrooms,id',
            'section_id' => 'nullable|exists:sections,id',
            'grade_id_new' => 'required|exists:grades,id',
            'classroom_id_new' => 'required|exists:classrooms,id',
            'section_id_new' => 'nullable|exists:sections,id',
        ]);

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

    public function destroy($request)
    {
        try {
            DB::beginTransaction();

            if ($request->page_id == 1) {
                $promotions = Promotion::all();

                if ($promotions->count() === 0) {
                    flash()->error(__('لا توجد ترقيات للتراجع عنها'));
                    return redirect()->back();
                }

                foreach ($promotions as $promotion) {

                    $ids = explode(',', $promotion->student_id);
                    Student::whereIn('id', $ids)->update([
                        'grade_id' => $promotion->from_grade_id,
                        'classroom_id' => $promotion->from_classroom_id,
                        'section_id' => $promotion->from_section_id,
                    ]);
                }

                Promotion::truncate();
                DB::commit();
                flash()->success(__('tables.success_msg'));
                return redirect()->back();

            } else {
                $promotion = Promotion::findOrFail($request->id);
                if (!$promotion) {
                    abort(404);
                }
                Student::where('id', $promotion->student_id)->update([
                    'grade_id' => $promotion->from_grade_id,
                    'classroom_id' => $promotion->from_classroom_id,
                    'section_id' => $promotion->from_section_id,
                ]);
                $promotion->delete();
                DB::commit();
                flash()->success(__('tables.success_msg'));
                return redirect()->back();
            }

        } catch (\Exception $e) {
            DB::rollback();
            flash()->error(__('tables.error_msg') . ': ' . $e->getMessage());
            return redirect()->back();
        }
    }
}
