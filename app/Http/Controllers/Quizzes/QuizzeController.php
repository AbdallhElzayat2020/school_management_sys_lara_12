<?php

namespace App\Http\Controllers\Quizzes;

use App\Http\Controllers\Controller;
use App\Repositories\QuizzesRepository;
use Illuminate\Http\Request;

class QuizzeController extends Controller
{
    public QuizzesRepository $quizzeRepository;

    public function __construct(QuizzesRepository $quizzeRepository)
    {
        $this->quizzeRepository = $quizzeRepository;
    }

    public function index()
    {
        return $this->quizzeRepository->index();
    }

    public function store(Request $request)
    {
        // validate with Request
        return $this->quizzeRepository->store($request);
    }

    public function update(Request $request, string $id)
    {
        // validate with Request
        return $this->quizzeRepository->update($request, $id);
    }

    public function destroy(string $id)
    {
        return $this->quizzeRepository->destroy($id);
    }
}
