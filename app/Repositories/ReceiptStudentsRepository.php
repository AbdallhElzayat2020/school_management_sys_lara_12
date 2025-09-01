<?php

namespace App\Repositories;

use App\Interfaces\ReceiptStudentsInterface;
use App\Models\FundAccount;
use App\Models\ReceiptStudent;
use App\Models\Student;
use App\Models\StudentAccount;
use Illuminate\Support\Facades\DB;

class ReceiptStudentsRepository implements ReceiptStudentsInterface
{
    public function index()
    {
        return ReceiptStudent::with('student')->get();
    }

    public function show($id)
    {
        $student = Student::findOrFail($id);
        return view('pages.students.receptStudent.add', compact('student'));
    }

    public function store($request)
    {
        /*
         * Make a validation before store
         * */


        DB::beginTransaction();
        try {

            $recept_student = ReceiptStudent::create([
                'date' => date('Y-m-d'),
                'student_id' => $request->student_id,
                'debit' => $request->debit,
                'description' => $request->description,
            ]);

            FundAccount::create([
                'date' => date('Y-m-d'),
                'receipt_student_id' => $recept_student->id,
                'debit' => $recept_student->debit,
                'credit' => 0.00,
                'description' => $recept_student->description,
            ]);

            StudentAccount::create([
                'date' => date('Y-m-d'),
                'type' => 'receipt',
                'receipt_student_id' => $recept_student->id,
                'student_id' => $recept_student->student_id,
                'debit' => 0.00,
                'credit' => $request->debit,
                'description' => $recept_student->description,
            ]);

            DB::commit();
            flash()->success('added successfully');
            return redirect()->route('recept-students.index');
        } catch (\Exception $exception) {
            DB::rollBack();
            return redirect()->back()->withErrors(['error' => $exception->getMessage()]);
        }
    }

    public function edit($id)
    {
        $receipt_student = ReceiptStudent::with('student')->findOrFail($id);
        return view('pages.students.receptStudent.edit', compact('receipt_student'));
    }

    public function update($request)
    {
        /*
         * Make a validation before Update
         * */


        DB::beginTransaction();
        try {

            $recept_student = ReceiptStudent::findOrFail($request->id);
            $recept_student->update([
                'date' => date('Y-m-d'),
                'student_id' => $request->student_id,
                'debit' => $request->debit,
                'description' => $request->description,
            ]);

            FundAccount::where('receipt_student_id', $request->id)->update([
                'date' => date('Y-m-d'),
                'debit' => $recept_student->debit,
                'credit' => 0.00,
                'description' => $recept_student->description,
            ]);

            StudentAccount::where('receipt_student_id', $request->id)->update([
                'date' => date('Y-m-d'),
                'type' => 'receipt',
                'student_id' => $recept_student->student_id,
                'debit' => 0.00,
                'credit' => $request->debit,
                'description' => $recept_student->description,
            ]);

            DB::commit();
            flash()->success('added successfully');
            return redirect()->route('recept-students.index');
        } catch (\Exception $exception) {
            DB::rollBack();
            return redirect()->back()->withErrors(['error' => $exception->getMessage()]);
        }
    }

    public function destroy($id)
    {
        try {
            ReceiptStudent::destroy($id);
            flash()->success('deleted successfully');
            return redirect()->route('recept-students.index');
        } catch (\Exception $exception) {
            return redirect()->back()->withErrors(['error' => $exception->getMessage()]);
        }
    }
}
