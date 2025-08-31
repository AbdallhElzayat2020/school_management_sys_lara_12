<?php

namespace App\Http\Controllers\Students;

use App\Http\Controllers\Controller;
use App\Repositories\ReceiptStudentsRepository;
use Illuminate\Http\Request;

class ReceiptStudentsController extends Controller
{

    protected ReceiptStudentsRepository $ReceiptStudentsRepository;

    public function __construct(ReceiptStudentsRepository $ReceiptStudentsRepository)
    {
        $this->ReceiptStudentsRepository = $ReceiptStudentsRepository;

    }

    public function index()
    {
        $receipt_students = $this->ReceiptStudentsRepository->index();
        return view('pages.students.receptStudent.index', compact('receipt_students'));
    }

    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        return $this->ReceiptStudentsRepository->store($request);
    }


    public function show(string $id)
    {
        return $this->ReceiptStudentsRepository->show($id);
    }


    public function edit(string $id)
    {
        return $this->ReceiptStudentsRepository->edit($id);
    }


    public function update(Request $request, string $id)
    {
        return $this->ReceiptStudentsRepository->update($id, $request);
    }


    public function destroy(string $id)
    {
        return $this->ReceiptStudentsRepository->destroy($id);
    }
}
