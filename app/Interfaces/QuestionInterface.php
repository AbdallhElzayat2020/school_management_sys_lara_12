<?php

namespace App\Interfaces;

interface QuestionInterface
{
    public function index($quizId);

    public function store($request);

    public function update($id, $request);

    public function destroy($id);
}
