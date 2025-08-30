<?php

namespace App\Http\Controllers\Students;

use App\Http\Controllers\Controller;
use App\Http\Requests\students\StoreGraduateRequest;
use App\Repositories\GraduatedStudentRepository;
use Illuminate\Http\Request;

class GraduatedController extends Controller
{

    public GraduatedStudentRepository $graduatedStudentRepository;

    public function __construct(GraduatedStudentRepository $graduatedStudentRepository)
    {
        $this->graduatedStudentRepository = $graduatedStudentRepository;
    }

    public function index()
    {
        $students = $this->graduatedStudentRepository->index();
        return view('pages.students.graduated.index', compact('students'));
    }


    public function create()
    {
        $grades = $this->graduatedStudentRepository->create();
        return view('pages.students.graduated.create', compact('grades'));
    }


    public function store(StoreGraduateRequest $request): \Illuminate\Http\RedirectResponse
    {
        return $this->graduatedStudentRepository->softDelete($request);
    }


    public function update(string $id): \Illuminate\Http\RedirectResponse
    {
        return $this->graduatedStudentRepository->restoreStudent($id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id): \Illuminate\Http\RedirectResponse
    {
        return $this->graduatedStudentRepository->forceDelete($id);
    }
}
