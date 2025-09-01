<?php

namespace App\Http\Controllers\Questions;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\QuestionRepository;

class QuestionController extends Controller
{

    protected $questionRepository;


    public function __construct(QuestionRepository $questionRepository)
    {
        $this->questionRepository = $questionRepository;
    }


    public function store(Request $request)
    {
        // validate in Request
        return $this->questionRepository->store($request);
    }


    public function update(Request $request, string $id)
    {
        // validate in Request
        return $this->questionRepository->update($id, $request);
    }


    public function destroy(string $id)
    {
        return $this->questionRepository->destroy($id);
    }
}
