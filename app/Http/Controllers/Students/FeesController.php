<?php

namespace App\Http\Controllers\Students;

use App\Http\Controllers\Controller;
use App\Http\Requests\Fees\StoreFeesRequest;
use App\Http\Requests\Fees\UpdateFeesRequest;
use App\Repositories\StudentFeesRepository;
use Illuminate\Http\Request;

class FeesController extends Controller
{

    public StudentFeesRepository $studentFeesRepository;

    public function __construct(StudentFeesRepository $studentFeesRepository)
    {
        $this->studentFeesRepository = $studentFeesRepository;
    }


    public function index()
    {
        return $this->studentFeesRepository->index();
    }

    public function create()
    {
        return $this->studentFeesRepository->create();
    }


    public function store(StoreFeesRequest $request)
    {
        return $this->studentFeesRepository->store($request);
    }


    public function edit(string $id)
    {
        return $this->studentFeesRepository->edit($id);
    }


    public function update(UpdateFeesRequest $request, string $id)
    {
        return $this->studentFeesRepository->update($request, $id);
    }


    public function destroy(string $id)
    {
        return $this->studentFeesRepository->destroy($id);
    }
}