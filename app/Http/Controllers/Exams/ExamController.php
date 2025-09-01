<?php

namespace App\Http\Controllers\Exams;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\ExamRepository;

class ExamController extends Controller
{
    protected $examRepository;

    public function __construct(ExamRepository $examRepository)
    {
        $this->examRepository = $examRepository;
    }

    public function index()
    {
        return $this->examRepository->index();
    }

    public function store(Request $request)
    {
        // Validate and store the exam data
        return $this->examRepository->store($request);
    }

    public function update(Request $request, string $id)
    {
        // Validate and update the exam data
        return $this->examRepository->update($id, $request);
    }

    public function destroy(string $id)
    {
        return $this->examRepository->destroy($id);
    }
}
