<?php

namespace App\Interfaces;

interface ExamInterface
{
    public function index();

    public function store($request);

    public function update($id, $request);

    public function destroy($id);
}
