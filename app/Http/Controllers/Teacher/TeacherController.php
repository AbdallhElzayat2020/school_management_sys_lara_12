<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use App\Http\Requests\Teachers\StoreTeacherRequest;
use App\Http\Requests\Teachers\UpdateTeacherRequest;
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

    public function store(StoreTeacherRequest $request)
    {
        return $this->teacherRepository->store($request);
    }


    public function edit(string $id)
    {
        return $this->teacherRepository->edit($id);

    }

    public function update(UpdateTeacherRequest $request, string $id)
    {
        return $this->teacherRepository->update($id, $request);
    }


    public function destroy(string $id)
    {
        return $this->teacherRepository->destroy($id);
    }


    public function changeStatus()
    {
    }
}
