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
                $feeInvoice = FeeInvoice::create([
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
                    'fee_invoice_id' => $feeInvoice->id,
                    'date' => date('Y-m-d'),
                    'type' => 'invoice',
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

    public function edit($id)
    {
        $feeInvoice = FeeInvoice::with('student')->findOrFail($id);
        $fees = Fees::where('classroom_id', $feeInvoice->classroom_id)->get();

        return view('pages.students.feesInvoices.edit', compact('feeInvoice', 'fees'));
    }

    public function update($id, $request)
    {

        DB::beginTransaction();
        try {
            $Fees = FeeInvoice::findorfail($id);
            $Fees->fee_id = $request->fee_id;
            $Fees->amount = $request->amount;
            $Fees->description = $request->description;
            $Fees->save();

            $StudentAccount = StudentAccount::where('fee_invoice_id', $id)->first();

            if ($StudentAccount) {
                $StudentAccount->debit = $request->amount;
                $StudentAccount->description = $request->description;
                $StudentAccount->save();
            } else {
                StudentAccount::create([
                    'student_id' => $Fees->student_id,
                    'fee_invoice_id' => $id,
                    'date' => date('Y-m-d'),
                    'type' => 'invoice',
                    'debit' => $request->amount,
                    'credit' => 0.00,
                    'description' => $request->description,
                ]);
            }

            DB::commit();

            flash()->success(__('tables.update_msg'));
            return redirect()->route('fees-invoices.index');
        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function destroy($id)
    {

        try {
            $feeInvoice = FeeInvoice::findOrFail($id);
            $feeInvoice->delete();

            flash()->success(__('tables.delete_msg'));
            return back();
        } catch (\Exception $exception) {
            return redirect()->back()->withErrors(['error' => $exception->getMessage()]);
        }
    }
}
