<?php

namespace App\Http\Controllers\Subjects;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\SubjectsRepository;

class SubjectController extends Controller
{
    protected $subjectsRepository;

    public function __construct(SubjectsRepository $subjectsRepository)
    {
        $this->subjectsRepository = $subjectsRepository;
    }

    public function index()
    {
        return $this->subjectsRepository->index();
    }


    public function create()
    {
        return $this->subjectsRepository->create();
    }


    public function store(Request $request)
    {
        return $this->subjectsRepository->store($request);
    }


    public function edit(string $id)
    {
        return $this->subjectsRepository->edit($id);
    }


    public function update(Request $request, string $id)
    {
        return $this->subjectsRepository->update($id, $request);
    }


    public function destroy(string $id)
    {
        return $this->subjectsRepository->destroy($id);
    }
}
