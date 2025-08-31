<?php

namespace App\Repositories;

use App\Interfaces\FeeInvoicesInterface;
use App\Models\Fees;
use App\Models\Student;

class FeeInvoicesRepository implements FeeInvoicesInterface
{
    public function index()
    {
        // TODO: Implement index() method.
    }

    public function show($id)
    {
        $student = Student::findOrFail($id);
        $fees = Fees::where('classroom_id', $student->classroom_id)->get();
        return view('pages.students.feesInvoices.fees_invoices', compact('student', 'fees'));
    }
}
