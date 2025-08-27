<?php

namespace App\Http\Controllers\Students;

use App\Http\Controllers\Controller;
use App\Http\Requests\students\StoreStudentRequest;
use App\Repositories\StudentRepository;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public StudentRepository $studentRepository;

    public function __construct(StudentRepository $studentRepository)
    {
        $this->studentRepository = $studentRepository;
    }

    public function index()
    {
        $students = $this->studentRepository->getAllStudents();
        return view('pages.students.index', compact('students'));
    }


    public function create()
    {
        return $this->studentRepository->createStudent();
    }


    public function store(StoreStudentRequest $request)
    {
        return $this->studentRepository->storeStudent($request);
    }


    public function edit(string $id)
    {
        return $this->studentRepository->editStudent($id);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        return $this->studentRepository->updateStudent($id, $request);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function changeStatus() {}
}
