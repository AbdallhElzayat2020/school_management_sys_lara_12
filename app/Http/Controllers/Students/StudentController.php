<?php

namespace App\Http\Controllers\Students;

use App\Http\Controllers\Controller;
use App\Http\Requests\students\StoreStudentRequest;
use App\Http\Requests\students\UpdateStudentRequest;
use App\Models\Student;
use App\Repositories\StudentRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

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

    public function show($id)
    {
        return $this->studentRepository->showStudent($id);
    }

    public function store(StoreStudentRequest $request)
    {
        return $this->studentRepository->storeStudent($request);
    }


    public function edit(string $id)
    {
        return $this->studentRepository->editStudent($id);
    }


    public function update(UpdateStudentRequest $request, string $id)
    {
        return $this->studentRepository->updateStudent($id, $request);
    }


    public function uploadAttachment(Request $request)
    {
        return $this->studentRepository->uploadAttachment($request);
    }


    public function destroy(string $id)
    {
        return $this->studentRepository->deleteStudent($id);
    }
}
