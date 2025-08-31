<?php

namespace App\Repositories;

use App\Interfaces\FeeInvoicesInterface;
use App\Models\FeeInvoice;
use App\Models\Fees;
use App\Models\Student;
use App\Models\StudentAccount;
use Illuminate\Support\Facades\DB;

class FeeInvoicesRepository implements FeeInvoicesInterface
{
    public function index()
    {
        return FeeInvoice::with(['student', 'fee', 'classroom', 'grade'])->get();
    }

    public function show($id)
    {
        $student = Student::findOrFail($id);
        $fees = Fees::where('classroom_id', $student->classroom_id)->get();

        return view('pages.students.feesInvoices.add', compact('student', 'fees'));
    }

    public function store($request)
    {
        $list_fees = $request->List_Fees;
        DB::beginTransaction();

        try {
            foreach ($list_fees as $fee) {
                FeeInvoice::create([
                    'invoice_date' => date('Y-m-d'),
                    'student_id' => $fee['student_id'],
                    'fee_id' => $fee['fee_id'],
                    'grade_id' => $request->grade_id,
                    'classroom_id' => $request->classroom_id,
                    'amount' => $fee['amount'],
                    'description' => $fee['description']
                ]);

                StudentAccount::create([
                    'student_id' => $fee['student_id'],
                    'grade_id' => $request->grade_id,
                    'classroom_id' => $request->classroom_id,
                    'debit' => $fee['amount'],
                    'credit' => 0.00,
                    'description' => $fee['description'],
                ]);
            }
            DB::commit();
            flash()->success('added successfully');
            return redirect()->route('fees-invoices.index');
        } catch (\Exception $exception) {
            DB::rollBack();
            return redirect()->back()->withErrors(['error' => $exception->getMessage()]);
        }
    }
}
