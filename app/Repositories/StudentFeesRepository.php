<?php

namespace App\Repositories;

use App\Models\Fees;
use App\Models\Grade;
use App\Models\Classroom;
use App\Interfaces\StudentFeesInterface;

class StudentFeesRepository implements StudentFeesInterface
{
    public function index()
    {
        $fees = Fees::with(['student', 'classroom', 'grade'])->get();
        $grades = Grade::all();
        return view('pages.students.fees.index', compact('fees', 'grades'));
    }

    public function create()
    {
        $grades = Grade::all();
        return view('pages.students.fees.create', compact('grades'));
    }

    public function store($request)
    {
        try {
            $fees = Fees::create([
                'title' => [
                    'ar' => $request->title['ar'],
                    'en' => $request->title['en'],
                ],
                'grade_id' => $request->grade_id,
                'classroom_id' => $request->classroom_id,
                'amount' => $request->amount,
                'academic_year' => $request->academic_year,
                'notes' => $request->notes,
            ]);
            flash()->success('Added Successfully');
            return redirect()->route('student-fees.index');
        } catch (\Exception $exception) {
            return redirect()->back()->withErrors(['error' => $exception->getMessage()]);
        }
    }


    public function edit($id)
    {
        $fee = Fees::findOrFail($id);
        $classrooms = Classroom::where('grade_id', $fee->grade_id)->get();
        $grades = Grade::all();
        return view('pages.students.fees.edit', compact('grades', 'fee', 'classrooms'));
    }

    public function update($request, $id)
    {
        try {
            $fee = Fees::findOrFail($id);
            $fee->update([
                'title' => [
                    'ar' => $request->title['ar'],
                    'en' => $request->title['en'],
                ],
                'grade_id' => $request->grade_id,
                'classroom_id' => $request->classroom_id,
                'amount' => $request->amount,
                'academic_year' => $request->academic_year,
                'notes' => $request->notes,
            ]);
            flash()->success('Updated Successfully');
            return redirect()->route('student-fees.index');
        } catch (\Exception $exception) {
            return redirect()->back()->withErrors(['error' => $exception->getMessage()]);
        }
    }


    public function destroy($id)
    {
        try {
            $fees = Fees::findOrFail($id);
            $fees->delete();
            flash()->success('Deleted Successfully');
            return redirect()->route('student-fees.index');
        } catch (\Exception $exception) {
            return redirect()->back()->withErrors(['error' => $exception->getMessage()]);
        }
    }
}