<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use App\Models\Teacher;
use App\Repositories\TeacherRepository;
use Illuminate\Http\Request;

class TeacherController extends Controller
{

    public TeacherRepository $teacherRepository;

    public function __construct(TeacherRepository $teacherRepository)
    {
        $this->teacherRepository = $teacherRepository;
    }

    public function index()
    {
        $teachers = $this->teacherRepository->getAll();
        return view('pages.teachers.index', compact('teachers'));
    }

    public function create()
    {
        return $this->teacherRepository->create();
    }

    public function store(Request $request)
    {
        return $this->teacherRepository->store($request);
    }


    public function show(string $id)
    {
        //
    }


    public function edit(string $id)
    {
        //
    }

    public function update(Request $request, string $id)
    {
        //
    }


    public function destroy(string $id)
    {
        //
    }


    public function changeStatus()
    {
    }
}
